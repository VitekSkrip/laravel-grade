<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;
use App\Models\Image;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $carImages = Image::get();

        Article::factory()
            ->count(5)
            ->sequence( fn ($sequence) =>
                [
                    'image_id' => $carImages->random(),
                    'published_at' => now()
                ]
            )
            ->create()
        ;
    }
}
