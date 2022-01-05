<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suministran;

class SuministranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suministran::factory()->count(10)->create();
    }
}
