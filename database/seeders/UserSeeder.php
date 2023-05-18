<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->hasProfile()->create();

        /** @var User $user */
        $user = User::factory()->create();
        $user->profile()->create([
            'telegram' => '@example',
            'about' => 'Пример связанной модели профиля вручную',
        ]);
    }
}
