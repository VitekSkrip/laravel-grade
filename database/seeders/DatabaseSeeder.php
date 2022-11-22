<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call([
            CarClassSeeder::class,
            CarEngineSeeder::class,
            CarBodySeeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
        ]);
        $this->call(ArticleSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(BannerSeeder::class);
    }
}
