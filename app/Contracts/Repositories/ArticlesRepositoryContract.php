<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Article;

interface ArticlesRepositoryContract
{
    public function getModel(): Article;

    public function getLatest(): Collection;

    public function findAll(): Collection;

    public function findForHomePage(int $limit): Collection;

    public function findBySlug(string $slug): Article;

    public function create(array $fields): Article;

    public function update(string $slug, array $fields): Article;

    public function delete(string $slug): Void;
}
