<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $categorias=[['nombre'=>'Procesador'],['nombre' => 'Memoria ram'],['nombre' => 'Tarjeta Gráfica'],['nombre' => 'Placa Base'],['nombre' => 'Discos'],['nombre' => 'Fuente Alimentación'],['nombre' => 'Caja']];
		DB::table('categorias')->insert($categorias);
    }
}
