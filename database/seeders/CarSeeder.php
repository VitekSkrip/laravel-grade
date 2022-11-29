<?php

namespace Database\Seeders;

use App;
use Illuminate\Database\Seeder;
use App\Models\CarBody,
      App\Models\CarClass,
      App\Models\CarEngine,
      App\Models\Car,
      App\Models\Image,
      App\Models\Category;

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
        $carImages = Image::get();
        $categories = Category::get();

        $cars = Car::factory()
            ->count(20)
            ->sequence( fn ($sequence) => 
                [
                    'class_id' => $carClasses->random(),
                    'engine_id' => $carEngines->random(),
                    'body_id' => $carBodies->random(),
                    'image_id' => $carImages->random(),
                    'category_id' => $categories->random(),
                ]
            )
            ->create()
        ;

        foreach ($cars as $car) {
            $car->imagesCatalog()->attach(Image::factory()->count(rand(0, 3))->create());
        }
    }
}
