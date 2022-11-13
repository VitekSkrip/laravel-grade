<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class UpdateArticleService implements UpdateArticleServiceContract
{
    public function __construct(private ArticlesRepositoryContract $articlesRepository, private TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        
    }

    public function update(string $slug, array $fields, array $tags)
    {
        return DB::transaction(function () use ($slug, $fields, $tags) {
            $article = $this->articlesRepository->update($slug, $fields);

            $this->tagsSynchronizerService->sync($article, $tags);

            return $article;
        });
    }
}
