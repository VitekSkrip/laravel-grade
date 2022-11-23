<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class CalculateStatisticsService
{
    public function __construct(private TagsRepositoryContract $tagsRepository, private ArticlesRepositoryContract $articlesRepository, private CarsRepositoryContract $carsRepository)
    {
        
    }

    public function getStatistics(): array
    {
        $articles_count = $this->articlesRepository->getCount();
        $cars_count = $this->carsRepository->getCount();

        $mostPopularTag = $this->implode($this->tagsRepository->getMostPopularTag());

        $longest_article = $this->implode($this->articlesRepository->getArticleWithShortestOrLongestBody('desc'));

        $shortest_article = $this->implode($this->articlesRepository->getArticleWithShortestOrLongestBody());

        $avgArticlesTag = $this->tagsRepository->getAvgArticlesTag();

        $mostTaggableArticle = $this->implode($this->articlesRepository->getMostTaggableArticle());

        return [
            [
                $articles_count, 
                $cars_count,
                $mostPopularTag,
                $longest_article,
                $shortest_article,
                $avgArticlesTag,
                $mostTaggableArticle,
            ],
        ];
    }

    private function implode(Collection $collection): string
    {
        return $collection->map('trim')->implode(', ');
    }
}
