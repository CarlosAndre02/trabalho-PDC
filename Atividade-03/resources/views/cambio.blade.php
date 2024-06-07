@extends('app')
@section('content')
    <div>
        <h1 class="flex justify-center text-white text-bold text-3xl mb-10">Câmbio</h1>
        <div class="container rounded-lg w-[900px] bg-indigo-100">
        <canvas id="myChart"></canvas>
    </div>
    </div>

    <script>
        const label = [];
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Cambio de moedas'
                    },
                },
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Ano'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Valor'
                        },
                    }
                }
            },
            data: {
                labels: label,
                datasets: [
                    {
                        label: 'USD',
                        data: 0,
                        backgroundColor: 'red',
                    },
                    {
                        label: 'BRL',
                        data: 0,
                        backgroundColor: 'yellow',
                    },
                    {
                        label: 'EUR',
                        data: 0,
                        backgroundColor: 'blue',
                    },
                    {
                        label: 'JPY',
                        data: 0,
                        backgroundColor: 'green',
                    }

                ],
            },
        });

        async function api() {
            const currentDate = new Date();
            const year = 2011;
            const month = currentDate.getMonth() + 1;
            const day = currentDate.getDate();

            const yearData = [];
            const usdData = [];
            const brlData = [];
            const eurData = [];
            const jpyData = [];

            for (let currentYear = year; currentYear <= 2023; currentYear++) {
                const url = `https://v6.exchangerate-api.com/v6/63631bac04fd2272cc7cc852/history/USD/${currentYear}/${month}/${day}`;
                const response = await fetch(url);
                const data = await response.json();
                const usd = data.conversion_rates.USD;
                const brl = data.conversion_rates.BRL;
                const eur = data.conversion_rates.EUR;
                const jpy = data.conversion_rates.JPY;

                yearData.push(currentYear);
                usdData.push(usd);
                brlData.push(brl);
                eurData.push(eur);
                jpyData.push(jpy);
            }

            return {
                year: yearData,
                usd: usdData,
                brl: brlData,
                eur: eurData,
                jpy: jpyData,
            };
        }

        api().then(data => {
            console.log(data);
            myChart.data.labels = data.year;
            myChart.data.datasets[0].data = data.usd;
            myChart.data.datasets[1].data = data.brl;
            myChart.data.datasets[2].data = data.eur;
            myChart.data.datasets[3].data = data.jpy;
            myChart.update();
        });
    </script>
@endsection
