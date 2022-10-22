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
        /** @var Collection $carClasses */
       $carClasses = CarClass::get();
       /** @var Collection $carEngines */
       $carEngines = CarEngine::get();
       /** @var Collection $carBodies */
       $carBodies = CarBody::get();

       foreach (Car::get() as $car) {
           Car::factory()->create(array_merge($car, [
               'class_id' => $carClasses->random(),
               'engine_id' => $carEngines->random(),
               'body_id' => $carBodies->random(),
           ]));
       }

    }
}
