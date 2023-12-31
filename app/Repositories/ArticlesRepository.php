<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Events\ArticleDeletedEvent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;

class ArticlesRepository implements ArticlesRepositoryContract
{
    use FlushesCache;

    public function __construct(
        private readonly Article $article,
        private readonly ImagesRepositoryContract $imagesRepository
    ) {
    }

    protected function cacheTags(): array
    {
        return ['articles'];
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
        return Cache::tags(['articles', 'images', 'tags'])->remember("articleBySlug|$slug", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->with(['image', 'tags'])->where('slug', $slug)->firstOrFail()
        );
    }

    public function findForHomePage(int $limit): Collection
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember("homePageArticles|$limit", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->with(['image', 'tags'])->whereNotNull('published_at')->latest('published_at')->limit($limit)->get()
        );
    }

    public function create(array $fields): Article
    {
        return $this->getModel()::create($fields);
    }

    public function update(Article $article, array $fields): Article
    {
        $article->update($fields);

        return $article;
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }

    public function paginateForArticlesList(
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
        array $withRelations = []
    ): LengthAwarePaginator {
        $params = serialize([
            'perPage' => $perPage,
            'fields' => $fields,
            'pageName' => $pageName,
            'page' => $page,
        ]);

        return Cache::tags(['articles', 'images', 'tags'])->remember("pagForArticlesList|$params", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->whereNotNull('published_at')->with($withRelations)->paginate($perPage, $fields, $pageName, $page)
        );
    }

    public function getCount(): int
    {
        return $this->getModel()->count();
    }

    public function getArticleWithShortestOrLongestBody(string $order = 'asc'): Collection
    {
        return Article::selectRaw('LENGTH(body) as length_of_body, id, title')->orderBy('length_of_body', $order)->limit(1)->get();
    }

    public function getMostTaggableArticle(): Collection
    {
        return $this->getModel()->select(['title', 'id'])->withCount('tags')->orderByDesc('tags_count')->limit(1)->get();
    }
}
