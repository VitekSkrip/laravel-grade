<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBody;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodies = [
            'Седан',
            'Хетчбек',
            'Универсал',
            'Купе',
            'Родстер',
            'Внедорожник',
            'Рамный',
            'Пикап',
            'Кроссовер',
        ];
 
        foreach ($bodies as $body) {
            CarBody::factory()->create(['name' => $body]);
        }
    }
}
