@extends('app')
@section('content')
    <div class="mt-2">
        <h1 class="flex justify-center text-white text-bold text-3xl mb-10">Horóscopo do Dia</h1>
        <p id="user" class="flex justify-center text-white"></p>
        <p class="flex justify-center text-white">Confira o que os astros têm a dizer para o seu signo hoje.</p>
        <div class="flex flex-wrap justify-center mt-10" id="horoscope-container"></div>
    </div>

    <script>
        const url = 'http://127.0.0.1:8000/api/horoscopos/signos';
        const token = '17|dm3zwpTxHvIKgOxjPg9ssM6emSOCRYJdHR034NcO';

        fetch(url, {
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                const horoscopes = data;
                const container = document.getElementById('horoscope-container');

                horoscopes.forEach(horoscope => {
                    document.getElementById('user').innerHTML = 'Olá, ' + horoscope.usuario + '!';

                    if (horoscope.signo != null) {


                        const element = document.createElement('a');
                        element.href = '/horoscopo/' + horoscope.signo;

                        const innerHTML = `
                    <div class="flex text-${horoscope.signo} flex-col justify-center items-center p-4 m-4">
                        <img src="img/ico-${horoscope.signo}.png" alt="${horoscope.signo}" class="w-32 h-32 image">
                        <h2 class="text-xl font-bold text-center">${horoscope.signo}</h2>
                        <p class="text-center">${horoscope.periodo}</p>
                    </div>
                `;
                        element.innerHTML = innerHTML;
                        container.appendChild(element);
                    }
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
