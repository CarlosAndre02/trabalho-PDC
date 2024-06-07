<?php

namespace Database\Seeders;

use App\Models\CoinCrypto;
use Illuminate\Database\Seeder;

class CoinCryptoSeeder extends Seeder
{
    public function run(): void
    {
        $coins = [
            [
                'type' => 'bitcoin',
                'acronym' => 'BTC',
                'value_in_real' => '133553.52'
            ],
            [
                'type' => 'ethereum',
                'acronym' => 'ETH',
                'value_in_real' => '9000.20'
            ],
            [
                'type' => 'litecoin',
                'acronym' => 'LTC',
                'value_in_real' => '443.69'
            ]
        ];

        foreach ($coins as $coin) {
            CoinCrypto::create($coin);
        }
    }

}
