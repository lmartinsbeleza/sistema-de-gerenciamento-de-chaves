<?php

namespace Database\Factories;

use App\Models\Chave;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()//função que faz gerar informações aleátorias para inserir no banco de dados
    {
        return [
            'codigo' => $this->faker->numberBetween(100,500),
            'status' => $this->faker->numberBetween(1,3),
            'sala' => $this->faker->numberBetween(1,20)
        ];
    }
}
