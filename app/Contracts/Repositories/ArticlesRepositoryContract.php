<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Article;

interface ArticlesRepositoryContract
{
    public function getArticle(): Article;

    public function getLatestArticles(): Collection;

    public function findAll(): Collection;

    // public function create(array $fields, array $tags = []): Article;
}
