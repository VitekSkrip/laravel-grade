<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(10)->create();

       foreach (Article::get() as $article) {
           /** @var Article $article */
           $article->tags()->saveMany($tags->random(rand(0, 3)));
       }
    }
}
