<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chave;

class ChaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chave = Chave::factory(10)->create();//chama a função factory para criar 10 chaves com informações aleátorias
    }
}
