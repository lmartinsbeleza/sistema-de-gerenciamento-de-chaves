<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([//adiciona os seguinte valores a tabela status
            ['status' => 'disponivel'],
            ['status' => 'indisponivel'],
            ['status' => 'reservada'],
            ['status' => 'atrasada']
        ]);
    }
}
