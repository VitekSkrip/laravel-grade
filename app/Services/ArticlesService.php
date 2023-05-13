<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\Articles\ArticleCreationServiceContract;
use App\Contracts\Services\Articles\ArticleRemoverServiceContract;
use App\Contracts\Services\Articles\ArticleUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ArticlesService implements ArticleCreationServiceContract, ArticleUpdateServiceContract, ArticleRemoverServiceContract
{
    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly TagsSynchronizerServiceContract $tagsSynchronizerService,
        private readonly ImagesServiceContract $imagesService
    ) {
    }

    public function create(array $fields, array $tags): void
    {
        DB::transaction(function () use ($fields, $tags) {
            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
                unset($fields['image']);
            }

            $article = $this->articlesRepository->create($fields);

            $this->tagsSynchronizerService->sync($article, $tags);

            $this->articlesRepository->flushCache();

            Event::dispatch(new ArticleCreatedEvent($article));
        });
    }

    public function update(string $slug, array $fields, array $tags): void
    {
        DB::transaction(function () use ($slug, $fields, $tags) {

            $oldImageId = null;
            $article = $this->articlesRepository->findBySlug($slug);

            if (! empty($fields['image'])) {
                $image = $this->imagesService->createImage($fields['image']);
                $fields['image_id'] = $image->id;
                $oldImageId = $article->image_id;
            }

            if (! empty($oldImageId)) {
                $this->imagesService->deleteImage($oldImageId);
            }

            $this->articlesRepository->update($article, $fields);

            $this->tagsSynchronizerService->sync($article, $tags);

            $this->articlesRepository->flushCache();

            Event::dispatch(new ArticleUpdatedEvent($article));

            return $article;
        });
    }

    public function delete(string $slug): void
    {
        DB::transaction(function () use ($slug) {
            $article = $this->articlesRepository->findBySlug($slug);

            $this->articlesRepository->delete($article);

            $this->articlesRepository->flushCache();

            Event::dispatch(new ArticleDeletedEvent($article));
        });
    }
}
