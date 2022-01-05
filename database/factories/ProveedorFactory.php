<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;
    protected $i=0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $proveedor=['PcComponentes','Acer','Intel','Asus', 'MSI', 'Corsair', 'HP','BenQ','Aorus','Amd'];
        return [
            'nombre' => $proveedor[$this->i++],
            'direccion' => $this->faker->address(),
            'cif' => 'B'.rand(10000000,99999999),
        ];
    }
}
