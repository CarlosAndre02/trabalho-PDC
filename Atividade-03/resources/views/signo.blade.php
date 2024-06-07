@extends('app')
@section('content')
    <style>
        .linha {
            height: 10px;
            width: 150px !important;
            background-color: #dabe5d;
            margin-bottom: 15px;
        }
    </style>
    <div class="mt-2 text-white w-[800px]">
        <h1 class="flex justify-center text-bold text-3xl mb-10"></h1>
        <img id="img" src="" alt="img-signo" class="mb-4">
        <div class="flex justify-between">
            <div id="date" class="text-bold text-xl"></div>
            <div class="flex justify-between gap-6">
                <a href="" id="ant" class="text-bold text-xl"></a>
                <a href="/horoscopo" class="text-bold text-xl">
                    <img src="{{asset('img/home.png')}}" alt="home" class="w-8 h-8 text-white">
                </a>
                <a href="" id="prox" class="text-bold text-xl"></a>
            </div>

        </div>
        <div class="border-b-2 border-[#dabe5d]"></div>
        <div class="linha mb-2"></div>
        <div>
            <div class="text-justify mb-2">
                <b>Mensagem: </b>
                <p id="mensagem"></p>
            </div>
            <div class="text-justify mb-2">
                <b>Trabalho: </b>
                <p id="trabalho"></p>
                <div>
                    <div class="text-justify mb-2">
                        <b>Amor: </b>
                        <p id="amor"></p>
                    </div>
                    <div class="text-justify mb-2">
                        <b>Saúde: </b>
                        <p id="saude"></p>
                    </div>
                    <div class="text-justify mb-2">
                        <b>Mega-Sena: </b>
                        <p id="mega"></p>
                    </div>
                </div>
            </div>
            <script>
                const url = 'http://127.0.0.1:8000/api/horoscopos/premium/{{$signo}}';
                const token = '17|dm3zwpTxHvIKgOxjPg9ssM6emSOCRYJdHR034NcO';

                fetch(url, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('h1').textContent = 'Horóscopo do Dia para ' + data.signo;
                        document.querySelector('#img').src = '/img/img-' + data.signo + '.jpg';
                        document.querySelector('#date').textContent = new Date().toLocaleDateString();
                        document.querySelector('#mensagem').textContent = data.mensagem;
                        document.querySelector('#trabalho').textContent = data.trabalho;
                        document.querySelector('#amor').textContent = data.amor;
                        document.querySelector('#saude').textContent = data.saude;
                        document.querySelector('#mega').textContent = data.mega_sena;

                        switch (data.signo) {
                            case 'Áries':
                                document.querySelector('#ant').textContent = 'Peixes';
                                document.querySelector('#ant').href = '/horoscopo/peixes';
                                document.querySelector('#prox').textContent = 'Touro';
                                document.querySelector('#prox').href = '/horoscopo/touro';
                                break;
                            case 'Touro':
                                document.querySelector('#ant').textContent = 'Áries';
                                document.querySelector('#ant').href = '/horoscopo/aries';
                                document.querySelector('#prox').textContent = 'Gêmeos';
                                document.querySelector('#prox').href = '/horoscopo/gemeos';
                                break;
                            case 'Gêmeos':
                                document.querySelector('#ant').textContent = 'Touro';
                                document.querySelector('#ant').href = '/horoscopo/touro';
                                document.querySelector('#prox').textContent = 'Câncer';
                                document.querySelector('#prox').href = '/horoscopo/cancer';
                                break;
                            case 'Câncer':
                                document.querySelector('#ant').textContent = 'Gêmeos';
                                document.querySelector('#ant').href = '/horoscopo/gemeos';
                                document.querySelector('#prox').textContent = 'Leão';
                                document.querySelector('#prox').href = '/horoscopo/leao';
                                break;
                            case 'Leão':
                                document.querySelector('#ant').textContent = 'Câncer';
                                document.querySelector('#ant').href = '/horoscopo/cancer';
                                document.querySelector('#prox').textContent = 'Virgem';
                                document.querySelector('#prox').href = '/horoscopo/virgem';
                                break;
                            case 'Virgem':
                                document.querySelector('#ant').textContent = 'Leão';
                                document.querySelector('#ant').href = '/horoscopo/leao';
                                document.querySelector('#prox').textContent = 'Libra';
                                document.querySelector('#prox').href = '/horoscopo/libra';
                                break;
                            case 'Libra':
                                document.querySelector('#ant').textContent = 'Virgem';
                                document.querySelector('#ant').href = '/horoscopo/virgem';
                                document.querySelector('#prox').textContent = 'Escorpião';
                                document.querySelector('#prox').href = '/horoscopo/escorpiao';
                                break;
                            case 'Escorpião':
                                document.querySelector('#ant').textContent = 'Libra';
                                document.querySelector('#ant').href = '/horoscopo/libra';
                                document.querySelector('#prox').textContent = 'Sagitário';
                                document.querySelector('#prox').href = '/horoscopo/sagitario';
                                break;
                            case 'Sagitário':
                                document.querySelector('#ant').textContent = 'Escorpião';
                                document.querySelector('#ant').href = '/horoscopo/escorpiao';
                                document.querySelector('#prox').textContent = 'Capricórnio';
                                document.querySelector('#prox').href = '/horoscopo/capricornio';
                                break;
                            case 'Capricórnio':
                                document.querySelector('#ant').textContent = 'Sagitário';
                                document.querySelector('#ant').href = '/horoscopo/sagitario';
                                document.querySelector('#prox').textContent = 'Aquário';
                                document.querySelector('#prox').href = '/horoscopo/aquario';
                                break;
                            case 'Aquário':
                                document.querySelector('#ant').textContent = 'Capricórnio';
                                document.querySelector('#ant').href = '/horoscopo/capricornio';
                                document.querySelector('#prox').textContent = 'Peixes';
                                document.querySelector('#prox').href = '/horoscopo/peixes';
                                break;
                            case 'Peixes':
                                document.querySelector('#ant').textContent = 'Aquário';
                                document.querySelector('#ant').href = '/horoscopo/aquario';
                                document.querySelector('#prox').textContent = 'Áries';
                                document.querySelector('#prox').href = '/horoscopo/aries';
                                break;
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>

@endsection
