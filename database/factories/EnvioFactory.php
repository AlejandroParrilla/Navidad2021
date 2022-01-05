<?php

namespace Database\Factories;

use App\Models\Envio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Producto;

class EnvioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Envio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date(),
            'cliente_id' => $this->faker->numberBetween(1, Cliente::count()),
            
        ];
    }
}
