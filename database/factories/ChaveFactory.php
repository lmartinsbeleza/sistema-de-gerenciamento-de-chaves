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
    public function definition()
    {
        return [
            'codigo' => $this->faker->numberBetween(100,500),
            'status' => $this->faker->numberBetween(1,4),
            'sala' => $this->faker->numberBetween(5,24)
        ];
    }
}
