<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Horoscopes;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Controlador para manipulação dos horóscopos.
 */
class HoroscopesController extends Controller
{
    /**
     * Obtém os dados do usuário.
     *
     * @return array Os dados do usuário.
     */
    public function getUser()
    {
        return
            [
                'nome' => auth()->user()->name,
                'aniversario' => auth()->user()->birthday,
            ];
    }

    /**
     * Obtém o signo com base em uma data.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return mixed|string O signo correspondente à data fornecida.
     */
    public function getSignoByDate($signo)
    {
        if ($signo == 'meusigno') {
            $date = auth()->user()->birthday;
            $signo = Horoscopes::where('start_date', '<=', $date)->where('end_date', '>=', $date)->first('signo');
            if (!$signo) return 'Capricórnio';
            return $signo['signo'];
        } else {
            return $signo;
        }
    }

    /**
     * Obtém os horóscopos com base no signo.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return Horoscopes|null O objeto de horóscopo correspondente ao signo.
     */
    public function getHoroscopes($signo)
    {
        try {
            $signo = $this->getSignoByDate($signo);
            return Horoscopes::where(function ($query) use ($signo) {
                $query->Where('signo', 'like', $signo . '%');
                if ($query->count() == 0)
                    $query->orWhere(DB::raw('signo'), '=', DB::raw($signo));
            })->first();
        } catch (Throwable $th) {
            return null;
        }
    }

    /**
     * Obtém todos os signos.
     *
     * @return JsonResponse Uma resposta JSON contendo todos os signos e seus períodos.
     */
    public function getAllSigno()
    {
        $horoscopos = [];
        foreach (Horoscopes::all() as $horoscopo) {
            $start_date = Carbon::createFromDate('2023-' . $horoscopo->start_date)->format('d/m');
            $end_date = Carbon::createFromDate('2023-' . $horoscopo->end_date)->format('d/m');

            $horoscopos[] = [
                'signo' => $horoscopo->signo,
                'periodo' => $start_date . ' até ' . $end_date,
            ];
        }
        $horoscopos[] = ['usuario' => auth()->user()->name];
        return response()->json($horoscopos);
    }

    /**
     * Obtém o horóscopo básico para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e as informações do horóscopo básico.
     */
    public function basic($signo)
    {
        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo ' . $signo . ' não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'mensagem' => $horoscopo->message_basic,
            'trabalho' => $horoscopo->work_basic,
        ]);
    }

    /**
     * Obtém o horóscopo premium para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e as informações do horóscopo premium.
     */
    public function premium($signo)
    {
        $faker = Faker::create();
        $numero = $faker->numberBetween(100000, 999999);

        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'mensagem' => $horoscopo->message_premium,
            'trabalho' => $horoscopo->work_basic,
            'sorte' => $horoscopo->lucky_premium,
            'amor' => $horoscopo->love_premium,
            'saude' => $horoscopo->health_premium,
            'mega_sena' => $numero,
        ]);
    }

    /**
     * Obtém apenas a mensagem do horóscopo para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e a mensagem do horóscopo.
     */
    public function message($signo)
    {
        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'mensagem' => $horoscopo->message_premium,
        ]);
    }

    /**
     * Obtém apenas a sorte do horóscopo premium para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e a sorte do horóscopo.
     */
    public function lucky($signo)
    {
        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'sorte' => $horoscopo->lucky_premium,
        ]);
    }

    /**
     * Obtém apenas as informações de amor do horóscopo premium para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e as informações de amor do horóscopo.
     */
    public function love($signo)
    {
        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'amor' => $horoscopo->love_premium,
        ]);
    }

    /**
     * Obtém apenas as informações de saúde do horóscopo premium para o signo fornecido.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário e as informações de saúde do horóscopo.
     */
    public function health($signo)
    {
        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'saúde' => $horoscopo->health_premium,
        ]);
    }

    /**
     * Obtém um número da Mega-Sena e retorna com os dados do usuário e o signo.
     *
     * @param string $signo O signo ou "meusigno" para o signo do usuário.
     * @return JsonResponse Uma resposta JSON contendo os dados do usuário, o signo e um número da Mega-Sena.
     */
    public function mega($signo)
    {
        $faker = Faker::create();
        $numero = $faker->numberBetween(100000, 999999);

        $signo = $this->getSignoByDate($signo);
        $horoscopo = $this->getHoroscopes($signo);
        if (!$horoscopo) return response()->json(['erro' => 'Signo não encontrado'], 404);
        return response()->json([
            'dados_usuario' => $this->getUser(),
            'signo' => $horoscopo->signo,
            'mega-sena' => $numero,
        ]);
    }
}
