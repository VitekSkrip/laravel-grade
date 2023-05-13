<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);

        $this->call([
            CarClassSeeder::class,
            CarEngineSeeder::class,
            CarBodySeeder::class,
            ImageSeeder::class,
        ]);

        $this->call(CarSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(SalonSeeder::class);
    }
}
