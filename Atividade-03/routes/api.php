<?php

use App\Http\Controllers\API\HoroscopesController;
use App\Http\Controllers\API\TokenGeneratorController;
use App\Http\Controllers\API\WalletController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// Retorna erro 404 para rotas inválidas
Route::fallback(function () {
    return response()->json(['mensagem' => 'Rota inválida'], 404);
});

// Gera e retorna tokens para todos os usuários
Route::get('/gerar-token', TokenGeneratorController::class);

// Retorna todos os tokens
Route::get('/tokens', function () {
    $users = User::all();
    $apiKeys = $users->map(function ($user) {
        return $user->token;
    });
    return response()->json($apiKeys);
});


// Retorna todas as rotas da API
Route::get('/api-routes', function () {
    $routes = collect(Route::getRoutes())->filter(function ($route) {
        return Str::startsWith($route->uri, 'api');
    })->map(function ($route) {
        return [
            'uri' => $route->uri,
            'description' => $route->action['description'] ?? '',
        ];
    });

    return $routes;
});

// Rotas da API que precisam de autenticação
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Retorna os dados do usuário autenticado
    Route::get('/user', [HoroscopesController::class, 'getUser'])
        ->action['description'] = 'Retorna os dados do usuário autenticado';

# ----------------------------API HOROSCOPO---------------------------- #
    // Retorna os nomes dos signos
    Route::get('/horoscopos/signos', [HoroscopesController::class, 'getAllSigno']);

    // Retorna o horoscopo básico
    Route::get('/horoscopos/basico/{signo}', [HoroscopesController::class, 'basic']);

    // Retorna o horoscopo premium
    Route::get('/horoscopos/premium/{signo}', [HoroscopesController::class, 'premium']);

    // Retorna a mensagem do horoscopo premium
    Route::get('/horoscopos/premium/mensagem/{signo}', [HoroscopesController::class, 'message']);

    // Retorna o trabalho do horoscopo premium
    Route::get('/horoscopos/premium/sorte/{signo}', [HoroscopesController::class, 'lucky']);

    // Retorna o amor do horoscopo premium
    Route::get('/horoscopos/premium/amor/{signo}', [HoroscopesController::class, 'love']);

    // Retorna a saúde do horoscopo premium
    Route::get('/horoscopos/premium/saude/{signo}', [HoroscopesController::class, 'health']);

    // Retorna a mega-sena do horoscopo premium
    Route::get('/horoscopos/premium/mega-sena/{signo}', [HoroscopesController::class, 'mega']);
# ----------------------------API HOROSCOPO---------------------------- #

# ----------------------------API CRIPTOMOEDA ---------------------------- #
    // Retorna todas as carteiras
    Route::get('/criptomoeda/carteiras', [WalletController::class, 'getWallets']);

    // Cria uma nova carteira
    Route::post('/criptomoeda/nova_carteira', [WalletController::class, 'newWallet']);

    // Retorna todas as carteiras do usuário
    Route::get('/criptomoeda/minhas_carteiras', [WalletController::class, 'getWallets']);

    // Adiciona saldo a uma carteira
    Route::post('/criptomoeda/adicionar_saldo', [WalletController::class, 'addBalance']);

    // Remove saldo de uma carteira
    Route::post('/criptomoeda/remover_saldo', [WalletController::class, 'removeBalance']);

    // Realiza transferência entre carteiras
    Route::post('/criptomoeda/transferir', [WalletController::class, 'balanceTransfer']);

    // Deleta uma carteira do usuário
    Route::delete('/criptomoeda/deletar_carteira/{walletId}', [WalletController::class, 'deleteWallet']);

    // Retorna o histórico de todas as transações
    Route::get('/criptomoeda/blockchain', [WalletController::class, 'getHistoryTransitions']);

    // Retorna o histórico de todas as transações das carteiras do usuário
    Route::get('/criptomoeda/meu_blockchain', [WalletController::class, 'getHistoryTransitionsUser']);

# ----------------------------API CRIPTOMOEDA ---------------------------- #

});
