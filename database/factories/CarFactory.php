<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarEngine;
use App\Models\CarClass;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kpps = [
            'Механическая',
            'Автоматическая',
            'Роботизированная',
            'Вариативная'
        ];

        return [
            'name' => $this->faker->word(),
            'body' => $this->faker->paragraph(),
            'price' =>$price = rand(100000, 5000000),
            'old_price' => $this->faker->optional()->numberBetween((int) ($price * 1.1), (int) ($price * 1.2)),
            'salon' => $this->faker->sentence(),
            'kpp' => $this->faker->randomElement($kpps),
            'year' => $this->faker->numberBetween(1992, 2022),
            'color' => $this->faker->colorName(),
            'is_new' => $this->faker->optional(0.5, false)->boolean(),
            'engine_id' => CarEngine::factory(),
            'class_id' => CarClass::factory(),
            'body_id' => CarBody::factory(),
            'image_id' => Image::factory(),
        ];
    }
}
