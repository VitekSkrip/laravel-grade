<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = Storage::disk('public')->putFile('cars', new File($this->faker->image(width: 1020, height: 498, category: 'car')));

        return [
            'path' => $path
        ];
    }
}
