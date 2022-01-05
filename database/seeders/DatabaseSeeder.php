<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder::class);
		$this->call(ClienteSeeder::class);
        $this->call(EnvioSeeder::class);
		$this->call(ProductoSeeder::class);
		$this->call(ProveedorSeeder::class);
        $this->call(SuministranSeeder::class);
    }
}
