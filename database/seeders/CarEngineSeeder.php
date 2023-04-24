<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    public function run()
    {
        CarEngine::factory()->count(10)->create();
    }
}
