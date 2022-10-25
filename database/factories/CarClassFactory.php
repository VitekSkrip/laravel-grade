<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarClass>
 */
class CarClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $classes = [
            'Бюджет',
            'Бизнес-класс',
            'Представительский класс',
            'Люкс',
        ];

        return [
            'name' => $this->faker->randomElement($classes),
        ];
    }
}
