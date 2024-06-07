<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();
        User::truncate();
        $users = [
            [
                'name' => 'Kevin',
                'birthday' => $faker->date('m-d'),
            ],
            [
                'name' => 'John',
                'birthday' => $faker->date('m-d'),
            ],
            [
                'name' => 'Jane',
                'birthday' => $faker->date('m-d'),
            ],
            [
                'name' => 'Jill',
                'birthday' => $faker->date('m-d'),
            ],
            [
                'name' => 'Vinicius Rosalen',
                'birthday' => $faker->date('m-d'),
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'birthday' => $user['birthday'],
            ]);
        }

    }
}
