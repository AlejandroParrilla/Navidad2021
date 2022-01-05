<?php

namespace Database\Factories;

use App\Models\Suministran;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proveedor;
use App\Models\Producto;

class SuministranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suministran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proveedor_id' => $this->faker->numberBetween(1, Proveedor::count()),
            'producto_id' => $this->faker->numberBetween(1, Producto::count())
        ];
    }
}
