<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => '(35) 959386145',
            'Estado' => $this->faker->state,
            'cidade' => $this->faker->city,
            'data_de_nascimento' => today()->subYears(rand(18, 60)),
        ];
    }
}
