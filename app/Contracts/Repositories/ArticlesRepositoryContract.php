<?php

namespace App\Contracts\Repositories;

use App\Contracts\Services\Articles\ArticleRemoverServiceContract;
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

    public function update(Article $article, array $fields): Article;

    public function delete(Article $article): Void;

    public function paginateForArticlesList(
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
        array $withRelations = []
    ): LengthAwarePaginator;

    public function getCount(): int;

    public function getArticleWithShortestOrLongestBody(string $order = 'asc'): Collection;

    public function getMostTaggableArticle(): Collection;
}
