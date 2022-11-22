<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DisplayStatisticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
     * The console command description.
     *
     * Общее количество машин.
     * Общее количество новостей.
     * Тег, у которого больше всего новостей на сайте.
     * Самая длинная новость — название, id новости и длина новости в символах.
     * Самая короткая новость — название, id новости и длина новости в символах.
     * Средние количество новостей у тега, из учета исключить теги без новостей.
     * Самая тегированная новость — название, id новости и количество тегов этой новости
     */
        
        // $articles_count = Article::count();
        // $cars_count = Car::count();

        $most_popular_tag = Tag::select(['name'])->withCount('articles')->orderBy('articles_count', 'desc')->limit(1)->get();


        // foreach ($tags as $tag) {
        //     echo $tag->name . ' ' . $tag->articles_count . ' ' . $tag->id . PHP_EOL;
        // }

        //$longest_article = DB::table('articles')->selectRaw('LENGTH(body) as length_of_body, id, title')->orderBy('length_of_body', 'desc')->limit(1)->get();

        //$shortest_article = DB::table('articles')->groupBy('id')->selectRaw('LENGTH(body) as length_of_body, id, title')->orderBy('length_of_body', 'asc')->limit(1)->get();

        //dd($articles_count, $cars_count, $longest_article, $shortest_article);

        // $this->table(['cars_count', 'articles_count', 'most_popular_tag', 'longest_article', 'shortest_article', 'avg_articles_tag', 'most_taggable_article'], $cars);

        return Command::SUCCESS;

    }
}
