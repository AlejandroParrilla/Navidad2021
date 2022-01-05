<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Envio;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Envio::factory()->count(20)->create();
    }
}
