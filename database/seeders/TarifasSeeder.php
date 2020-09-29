<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarifa;
use Faker\Factory as Faker;

class TarifasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        ['data_ini','data_fim','preco','estoque','disponivel'];
        $faker = Faker::create();

        $pacotes = [
            '3 dias no Rio de Janeiro',
            '1 dia ida e volta',
            '7 dias no Porto Seguro',
            '5 dias em Fortaleza',
            ''
        ];

        foreach (range(1,10) as $index) {
            Tarifa::create([
                'preco' => $faker->randomFloat(2, 100, 15000),
                'estoque' => $faker->randomElement($pacotes),
                'disponivel' => $faker->randomElement($array = array ('S','N')),
                'data_ini' => $faker->date('Y-m-d', date('Y-m-d')),
                'data_fim' => $faker->date('Y-m-d', date('Y-m-d'))
            ]);
        }
    }
}
