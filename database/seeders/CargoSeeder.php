<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([//adiciona os seguinte valores a tabela cargos
            ['cargo' => 'admin'],
            ['cargo' => 'comum']
        ]);
    }
}
