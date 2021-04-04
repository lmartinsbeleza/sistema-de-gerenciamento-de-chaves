<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([//chama todas as seed para popular o banco de dados com as informações iniciais
            CargoSeeder::class,
            StatusSeeder::class,
            UserSeeder::class
        ]);
    }
}
