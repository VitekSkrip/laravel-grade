<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Events\ArticleUpdatedEvent;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

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

            Event::dispatch(new ArticleUpdatedEvent($article));

            return $article;
        });
    }
}
