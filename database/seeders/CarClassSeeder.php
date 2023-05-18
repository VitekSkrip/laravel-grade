<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    public function run()
    {
        $classes = [
            'Бюджет',
            'Бизнес-класс',
            'Представительский класс',
            'Люкс',
        ];

        foreach ($classes as $class) {
            CarClass::factory()->create(['name' => $class]);
        }
    }
}
