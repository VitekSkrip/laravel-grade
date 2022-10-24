<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBody,
      App\Models\CarClass,
      App\Models\CarEngine,
      App\Models\Car;
use Doctrine\DBAL\Schema\Sequence;

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

        Car::factory()
            ->count(20)
            ->sequence( fn ($sequence) => 
                [
                    'class_id' => $carClasses->random(),
                    'engine_id' => $carEngines->random(),
                    'body_id' => $carBodies->random()
                ]
            )
            ->create();
    }
}
