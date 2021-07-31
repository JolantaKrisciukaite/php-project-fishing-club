<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_EN');

        DB::table('users')->insert([
            'name' => 'Jolanta',
            'email' => 'jkrisciukaite@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Raudona',
            'email' => 'raudona.zeme@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $titles = ['Nile', 'Amazon', 'Yangtze (Chang Jiang)', 'Mississippi - Missouri', 'East China Sea', '	Beaufort Sea', 'Bering Sea', 'Salisbury Steak', 'Lena', 'Tocantins', 'Congo', 'Mississippi'];
        foreach (range(1, 20) as $_) {
            DB::table('reservoirs')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'area' => rand(1, 10000),
                'about' => $faker->realText(300, 5),
            ]);
        }
        
        foreach(range(1, 200) as $_) {
            DB::table('members')->insert([
                'name' => $faker->firstname,
                'surname' => $faker->lastname,
                'live' => $faker->city,
                'experience' => rand(1, 75),
                'registered' => rand(1942, 2021),
                'reservoir_id' => rand(1, 20),
            ]);
        }
    }
}
