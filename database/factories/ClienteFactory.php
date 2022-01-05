<?php

namespace Database\Factories;

use App\Models\Cliente;
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
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName().' '.$this->faker->lastName(),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->mobileNumber(),
            'fecha_nac' =>  $this->faker->dateTimeBetween('-40 year', '-18 year'),
            'dni' => $this->faker->dni(),
        ];
    }
}
