<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBody,
      App\Models\CarClass,
      App\Models\CarEngine,
      App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carEngines = CarEngine::get();
        $carClasses = CarClass::get();
        $carBodies = CarBody::get();

        Car::factory()->count(20)->create(
            [
                'body_id' =>  $carBodies->random(),
                'engine_id' => $carEngines->random(),
                'class_id' => $carClasses->random()
            ]
        );
    }
}
