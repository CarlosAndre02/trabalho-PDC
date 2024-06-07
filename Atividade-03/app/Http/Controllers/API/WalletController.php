<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CoinCrypto;
use App\Models\HistoryTransition;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador para operações relacionadas a carteiras.
 */
class WalletController extends Controller
{
    /**
     * Obtém todas as carteiras ou apenas as carteiras do usuário autenticado.
     *
     * @param Request $request A solicitação HTTP.
     * @return JsonResponse Uma resposta JSON contendo as carteiras encontradas.
     */
    public function getWallets(Request $request)
    {
        $walletsData = [];
        if ($request->path() == 'api/criptomoeda/carteiras') $wallets = Wallet::all()->sortBy('coinCrypto.type'); else
            $wallets = Wallet::where('user_id', auth()->user()->id)->get()->sortBy('coinCrypto.type');
        foreach ($wallets as $wallet) {
            $walletsData[] = ['id' => $wallet->id, 'moeda' => $wallet->coinCrypto->type, 'saldo' => $wallet->balance . ' ' . $wallet->coinCrypto->acronym, 'saldo em real' => 'R$ ' . number_format($wallet->balance * $wallet->coinCrypto->value_in_real, 2, ',', '.'), 'valor unitario' => 'R$ ' . number_format($wallet->coinCrypto->value_in_real, 2, ',', '.'), 'Dono' => $wallet->user->name ?? 'Sem dono',];
        }
        return response()->json(['carteiras' => $walletsData], 200);
    }

    /**
     * Obtém as informações de uma carteira específica.
     *
     * @param int $id O ID da carteira.
     * @return array As informações da carteira.
     */
    private function getWalletInfo($id)
    {
        $wallet = Wallet::find($id);
        return ['id' => $wallet->id, 'moeda' => $wallet->coinCrypto->type, 'saldo' => $wallet->balance . ' ' . $wallet->coinCrypto->acronym, 'saldo em real' => 'R$ ' . number_format($wallet->balance * $wallet->coinCrypto->value_in_real, 2, ',', '.'), 'valor unitario' => 'R$ ' . number_format($wallet->coinCrypto->value_in_real, 2, ',', '.'), 'Dono' => $wallet->user->name ?? 'Sem dono',];
    }

    /**
     * Cria uma nova carteira para o usuário autenticado.
     *
     * @param Request $request A solicitação HTTP.
     * @return JsonResponse Uma resposta JSON contendo a carteira criada.
     */
    public function newWallet(Request $request)
    {
        $type_coin = strtolower($request->tipo);
        switch ($type_coin) {
            case 'btc':
            case 'bitcoin':
                $coin_crypto_id = 1;
                break;
            case 'eth':
            case 'ethereum':
                $coin_crypto_id = 2;
                break;
            case 'ltc':
            case 'litecoin':
                $coin_crypto_id = 3;
                break;
            default:
                return response()->json(['message' => 'Moeda não encontrada'], 404);
        }

        $existWallet = Wallet::where('user_id', auth()->user()->id)->where('coin_crypto_id', $coin_crypto_id)->count();

        if ($existWallet > 0) {
            return response()->json(['message' => 'Carteira já existe'], 404);
        }

        $wallet = Wallet::create(['user_id' => auth()->user()->id, 'balance' => $request->saldo ?? 0, 'coin_crypto_id' => $coin_crypto_id,]);

        return response()->json(['message' => 'Carteira criada com sucesso', 'carteira' => $this->getWalletInfo($wallet->id),], 201);
    }

    /**
     * Adiciona saldo a uma carteira.
     *
     * @param Request $request A solicitação HTTP contendo o ID da carteira e o saldo a ser adicionado.
     * @return JsonResponse Uma resposta JSON confirmando a adição de saldo.
     */
    public function addBalance(Request $request)
    {
        $wallet = Wallet::where('user_id', auth()->user()->id)->where('id', $request->id_carteira)->first();

        if (!$wallet) {
            return response()->json(['message' => 'Carteira não encontrada'], 404);
        }

        $wallet->balance += $request->saldo;
        $wallet->save();

        $this->createHistoryTransition($request->saldo, 'Adicionado saldo na carteira', $wallet->id, $wallet->id);

        return response()->json(['message' => 'Saldo adicionado com sucesso', 'carteira' => $this->getWalletInfo($request->id_carteira),]);
    }

    /**
     * Remove saldo de uma carteira.
     *
     * @param Request $request A solicitação HTTP contendo o ID da carteira e o saldo a ser removido.
     * @return JsonResponse Uma resposta JSON confirmando a remoção de saldo.
     */
    public function removeBalance(Request $request)
    {
        $wallet = Wallet::where('user_id', auth()->user()->id)->where('id', $request->id_carteira)->first();

        if (!$wallet) {
            return response()->json(['message' => 'Carteira não encontrada'], 404);
        }
        if ($wallet->balance < $request->saldo) {
            return response()->json(['message' => 'Saldo insuficiente'], 404);
        }

        $wallet->balance -= $request->saldo;
        $wallet->save();

        $this->createHistoryTransition($request->saldo, 'Removendo saldo na carteira', $wallet->id, $wallet->id);

        return response()->json(['message' => 'Saldo removido com sucesso', 'carteira' => $this->getWalletInfo($request->id_carteira),]);
    }

    /**
     * Transfere saldo entre carteiras.
     *
     * @param Request $request A solicitação HTTP contendo os IDs das carteiras de origem e destino, e o saldo a ser transferido.
     * @return JsonResponse Uma resposta JSON confirmando a transferência de saldo.
     */
    public function balanceTransfer(Request $request)
    {
        $walletFrom = Wallet::where('user_id', auth()->user()->id)->where('id', $request->id_carteira_origem)->first();
        $walletTo = Wallet::find(request()->id_carteira_destino);

        if (!$walletFrom) {
            return response()->json(['message' => 'Carteira de Origem não encontrada'], 404);
        }
        if (!$walletTo) {
            return response()->json(['message' => 'Carteira de Destino não encontrada'], 404);
        }

        if ($walletFrom->balance < $request->saldo) {
            return response()->json(['message' => 'Saldo insuficiente'], 404);
        }

        $saldo = $request->saldo;
        $walletFrom->balance -= $saldo;

        if ($walletFrom->coin_crypto_id != $walletTo->coin_crypto_id) {
            $saldo = $this->balanceConverter($saldo, $walletFrom->coin_crypto_id, $walletTo->coin_crypto_id);
        }

        $walletTo->balance += $saldo;
        $walletFrom->save();
        $walletTo->save();

        $this->createHistoryTransition($request->saldo, 'Realizando transferencia de saldo', $walletFrom->id, $walletTo->id);

        return response()->json(['message' => 'Saldo de ' . $saldo . ' transferido com sucesso', 'carteira' => $this->getWalletInfo($request->id_carteira_origem),]);
    }

    /**
     * Exclui uma carteira.
     *
     * @param int $walletId O ID da carteira a ser excluída.
     * @return JsonResponse Uma resposta JSON confirmando a exclusão da carteira.
     */
    public function deleteWallet($walletId)
    {
        $wallet = Wallet::where('user_id', auth()->user()->id)->where('id', $walletId)->first();
        if (!$wallet) {
            return response()->json(['message' => 'Carteira não encontrada'], 404);
        }
        $wallet->delete();
        return response()->json(['message' => 'Carteira deletada com sucesso',], 200);
    }

    /**
     * Obtém o histórico de transições.
     *
     * @return JsonResponse Uma resposta JSON contendo o histórico de transações.
     */
    public function getHistoryTransitions()
    {
        $transitions = HistoryTransition::where('description', 'Realizando transferencia de saldo')->orderBy('date', 'desc')->get();

        if ($transitions->count() == 0) {
            return response()->json(['message' => 'Nenhuma transação encontrada',], 404);
        }

        $transitionData = [];

        foreach ($transitions as $transition) {
            $coin_type_balance_in_real = $transition->wallet->coinCrypto->value_in_real;
            $transitionData[] = ['transacao_id' => $transition->id, 'data' => $transition->date, 'valor' => $transition->amount . ' ' . $transition->wallet->coinCrypto->acronym, 'valor_convertido' => 'R$' . number_format($transition->amount * $coin_type_balance_in_real, 2, ',', '.'), 'carteira_origem' => $transition->from_wallet_id, 'carteira_destino' => $transition->to_wallet_id,];
        }
        return response()->json(['message' => 'Histórico de transações', 'blockchain' => $transitionData,], 200);
    }

    /**
     * Obtém o histórico de transições do usuário.
     *
     * @return JsonResponse Uma resposta JSON contendo o histórico de transações do usuário.
     */
    public function getUserHistoryTransitions()
    {
        $userTransitions = HistoryTransition::where('description', 'Realizando transferencia de saldo')->where('user_id', auth()->user()->id)->orderBy('date', 'desc')->get();

        if ($userTransitions->count() == 0) {
            return response()->json(['message' => 'Nenhuma transação encontrada',], 404);
        }

        $transitionData = [];

        foreach ($userTransitions as $transition) {
            $coin_type_balance_in_real = $transition->wallet->coinCrypto->value_in_real;
            $transitionData[] = ['transacao_id' => $transition->id, 'data' => $transition->date, 'valor' => $transition->amount . ' ' . $transition->wallet->coinCrypto->acronym, 'valor_convertido' => 'R$' . number_format($transition->amount * $coin_type_balance_in_real, 2, ',', '.'), 'carteira_origem' => $transition->from_wallet_id, 'carteira_destino' => $transition->to_wallet_id,];
        }
        return response()->json(['message' => 'Histórico de transações do usuário', 'blockchain' => $transitionData,], 200);
    }

    /**
     * Cria um registro de transição no histórico.
     *
     * @param float $amount O valor da transição.
     * @param string $description A descrição da transição.
     * @param int $fromWalletId O ID da carteira de origem.
     * @param int $toWalletId O ID da carteira de destino.
     */
    private function createHistoryTransition($amount, $description, $fromWalletId, $toWalletId)
    {
        HistoryTransition::create(['amount' => $amount, 'description' => $description, 'date' => date('Y-m-d H:i:s'), 'from_wallet_id' => $fromWalletId, 'to_wallet_id' => $toWalletId, 'user_id' => auth()->user()->id,]);
    }

    /**
     * Converte o valor de uma moeda para outra moeda.
     *
     * @param float $amount O valor a ser convertido.
     * @param int $fromCoinId O ID da moeda de origem.
     * @param int $toCoinId O ID da moeda de destino.
     * @return float O valor convertido.
     */
    private function balanceConverter($amount, $fromCoinId, $toCoinId)
    {
        $fromCoinValueInReal = CoinCrypto::find($fromCoinId)->value_in_real;
        $toCoinValueInReal = CoinCrypto::find($toCoinId)->value_in_real;

        return ($amount / $fromCoinValueInReal) * $toCoinValueInReal;
    }
}
