<?php

namespace Database\Factories;

use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plano::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'valor_mensal' => rand(100, 1000),
        ];
    }
}
