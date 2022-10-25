<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarClass;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
