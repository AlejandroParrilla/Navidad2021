<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Envio;
use App\Models\Categoria;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'igic'    => '6',
            'nombre' => $this->faker->firstname(),
            'precio'     => rand(1, 1000),
            'stock'    => rand(1, 1000),
            'detalle'    => $this->faker->address(),
            'categoria_id' => $this->faker->numberBetween(1, Categoria::count()),
            'envio_id' => $this->faker->numberBetween(1, Envio::count()),
        ];
    }
}
