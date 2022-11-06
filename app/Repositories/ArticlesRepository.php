<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Contracts\Repositories\ImagesRepositoryContract;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function __construct(private Article $article, private ImagesRepositoryContract $imagesRepository)
    {
        
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getModel(): Article
    {
        return $this->article;
    }

    public function getLatest(): Collection
    {
        return $this->getModel()->latest('published_at')->get();
    }

    public function findBySlug(string $slug): Article
    {
        return $this->getModel()->where('slug', $slug)->firstOrFail();
    }

    public function findForHomePage(int $limit): Collection
    {
        return $this->getModel()->whereNotNull('published_at')->latest('published_at')->limit($limit)->get();
    }

    public function create(array $fields): Article
    {
        $image = $this->imagesRepository->create($fields['image']);

        $fields['image_id'] = $image->id;
        unset($fields['image']);

        return $this->getModel()::create($fields);
    }

    public function update(string $slug, array $fields): Article
    {
        $article = $this->findBySlug($slug);

        $image = $this->imagesRepository->create($fields['image']);

        $fields['image_id'] = $image->id;
        unset($fields['image']);
        
        $article->update($fields);
        
        return $article;
    }

    public function delete(string $slug): Void
    {
        $this->getModel()->where('slug', $slug)->delete();
    }

    public function paginateForArticlesList(int $perPage = 10, array $fields = ['*'], string $pageName = 'page', int $page = 1): LengthAwarePaginator
    {
        return $this->getModel()->paginate($perPage, $fields, $pageName, $page);
    }
}
