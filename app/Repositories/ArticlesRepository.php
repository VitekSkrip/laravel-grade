<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Collection;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function __construct(private readonly Article $article)
    {
        
    }

    public function findAll(): Collection
    {
        return $this->getArticle()->get();
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function getLatestArticles(): Collection
    {
        return $this->getArticle()->latest('published_at')->get();
    }

    // public function create(array $fields, array $tags = []): Article
    // {
    //     $article = $this->getArticle()->create($fields);
    // }

}
