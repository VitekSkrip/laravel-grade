<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Models\Article;

class UpdateArticleService implements UpdateArticleServiceContract
{
    public function __construct(private ArticlesRepositoryContract $articlesRepository, private TagsSynchronizerServiceContract $tagsSynchronizerService)
    {
        
    }

    public function update(string $slug, array $fields, array $tags): Article
    {
        $article = $this->articlesRepository->update($slug, $fields);

        $this->tagsSynchronizerService->sync($article, $tags);
        
        return $article;
    }
}
