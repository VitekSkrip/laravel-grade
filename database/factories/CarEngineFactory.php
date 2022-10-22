<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarEngine>
 */
class CarEngineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => sprintf(
                '%s MPI / %s л.с./ %s',
                number_format(rand(10, 90) / 10, 1, '.'),
                rand(80, 600),
                $this->faker->randomElement(['Бензин', 'Дизель', 'Газ', 'Электро'])
            ), 
        ];
    }
}
