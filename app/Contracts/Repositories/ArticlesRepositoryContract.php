<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function paginateForArticlesList(
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator;

    public function getCount(): int;

    public function getArticleWithShortestOrLongestBody(string $order = 'asc'): Collection;

    public function getMostTaggableArticle(): Collection;
}
