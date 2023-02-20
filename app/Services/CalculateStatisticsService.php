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

    public function getStatistics(array $whatToCalculate): array
    {
        $result = [];
        foreach ($whatToCalculate as $stat) {
            if ($stat == 'articles_count') {
                $result[] = $this->articlesRepository->getCount();
            }
            if ($stat == 'cars_count') {
                $result[] = $this->carsRepository->getCount();
            }
            if ($stat == 'mostPopularTag') {
                $result[] = $this->implode($this->tagsRepository->getMostPopularTag());
            }
            if ($stat == 'longest_article') {
                $result[] = $this->implode($this->articlesRepository->getArticleWithShortestOrLongestBody('desc'));
            }
            if ($stat == 'shortest_article') {
                $result[] = $this->implode($this->articlesRepository->getArticleWithShortestOrLongestBody());
            }
            if ($stat == 'avgArticlesTag') {
                $result[] = $this->tagsRepository->getAvgArticlesTag();
            }
            if ($stat == 'mostTaggableArticle') {
                $result[] = $this->implode($this->articlesRepository->getMostTaggableArticle());
            }
        }

        return $result;
    }

    private function implode(Collection $collection): string
    {
        return $collection->map('trim')->implode(', ');
    }
}
