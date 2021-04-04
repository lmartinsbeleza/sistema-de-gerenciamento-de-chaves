<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([//adciona o usuário admin para a utilização do sistema
            'name' => 'admin',
            'email' => 'admin@mail',
            'password' => bcrypt('123'),
            'cargo' => 1
        ]);
    }
}
