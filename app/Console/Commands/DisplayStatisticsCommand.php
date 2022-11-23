<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use App\Services\StatisticsCommandService;
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
    public function handle(StatisticsCommandService $statService)
    {
        /**
         * The console command description.
         *
         */
        
        $results = $statService->getStatistics();

        $this->table(['articles_count', 'cars_count', 'mostPopularTag', 'longest_article', 'shortest_article', 'avg_articles_tag', 'most_taggable_article', 'most_taggable_article'], $results);

        return Command::SUCCESS;

    }
}
