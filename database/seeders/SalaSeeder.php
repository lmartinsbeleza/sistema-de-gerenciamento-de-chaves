<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sala;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sala = Sala::factory(10)->create();//chama a função factory para criar 10 salas com informações aleátorias
    }
}
