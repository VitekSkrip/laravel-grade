<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarEngine;
use App\Models\CarClass;
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
        return [
            'engine_id' => CarEngine::factory(),
            'class_id' => CarClass::factory(),
            'body_id' => CarBody::factory(),
        ];
    }
}
