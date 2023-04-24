<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Car;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\CarBody;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CarSeeder extends Seeder
{
    public function run(ImagesServiceContract $imagesService)
    {
        /** @var Collection $carClasses */
        $carClasses = CarClass::get();
        /** @var Collection $carEngines */
        $carEngines = CarEngine::get();
        /** @var Collection $carBodies */
        $carBodies = CarBody::get();
        /** @var Collection $categories */
        $categories = Category::get();

        foreach ($this->cars() as $car) {
            /** @var Car $carModel */
            if (! empty($car['image'])) {
                $image = $imagesService->createImage(resource_path($car['image']));
                $car['image_id'] = $image->id;
            }
            unset($car['image']);
            $carModel = Car::factory()->create(array_merge($car, [
                'class_id' => $carClasses->random(),
                'engine_id' => $carEngines->random(),
                'body_id' => $carBodies->random(),
                'category_id' => $categories->random()
            ]));

            $carModel->images()->attach(Image::factory()->count(rand(0, 3))->create());
        }
    }

    private function cars(): array
    {
        return [
            [
                'name' => 'Seed',
                'image' => 'assets/pictures/car_ceed.png',
                'price' => $price = 1394900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Cerato',
                'image' => 'assets/pictures/car_cerato.png',
                'price' => $price = 1221900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'K5',
                'image' => 'assets/pictures/car_K5-half.png',
                'price' => $price = 1577900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'K900',
                'image' => 'assets/pictures/car_k900.png',
                'price' => $price = 4064900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Mohave',
                'image' => 'assets/pictures/car_mohave_new.png',
                'price' => $price = 3549900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Stinger',
                'image' => 'assets/pictures/car_new_stinger.png',
                'price' => $price = 2409900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Rio',
                'image' => 'assets/pictures/car_rio-x.png',
                'price' => $price = 969900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Rio',
                'image' => 'assets/pictures/car_rio_new.png',
                'price' => $price = 849900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Seltos',
                'image' => 'assets/pictures/car_seltos.png',
                'price' => $price = 1224900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Sorento',
                'image' => 'assets/pictures/car_sorento_new.png',
                'price' => $price = 2219900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Soul',
                'image' => 'assets/pictures/car_soul.png',
                'price' => $price = 1094900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Sportage',
                'image' => 'assets/pictures/car_sportage.png',
                'price' => $price = 1644900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'XSeed',
                'image' => 'assets/pictures/car_xceed.png',
                'price' => $price = 1714900,
                'old_price' => rand(0, 3) > 2 ? $price + rand(1, 10000) : null,
            ],
            [
                'name' => 'Some Car',
                'image' => null,
                'image_id' => null,
                'price' => 9999999,
                'old_price' => null,
            ],
        ];
    }
}
