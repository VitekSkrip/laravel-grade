<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Events\ArticleCreatedEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class CreateArticleService implements CreateArticleServiceContract
{
    public function __construct(
        private ArticlesRepositoryContract $articlesRepository,
        private TagsSynchronizerServiceContract $tagsSynchronizerService
    ) {
    }

    public function create(array $fields, array $tags): void
    {
        DB::transaction(function () use ($fields, $tags) {
            $article = $this->articlesRepository->create($fields);

            $this->tagsSynchronizerService->sync($article, $tags);

            Event::dispatch(new ArticleCreatedEvent($article));
        });
    }
}
