<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\Cache;

class CategoriesRepository implements CategoriesRepositoryContract
{
    use FlushesCache;
    
    public function __construct(private Category $model)
    {
        
    }

    protected function cacheTags(): array
    {
        return ['categories'];
    }

    private function getModel(): Category
    {
        return $this->model;
    }

    public function getTree(?int $maxDepth = null): Collection
    {
        return Cache::tags(['categories'])->remember("categoriesMaxDepth|$maxDepth", Carbon::now()->addHours(1), fn () =>
            $this->getModel()
            ->withDepth()
            ->when($maxDepth, function ($query, $maxDepth) { 
                $query->having('depth', '<=', $maxDepth);
            })
            ->get()
            ->toTree()
        );
    }

    public function getBySlug(string $slug, array $relations): Category
    {
        return Cache::tags(['categories'])->remember(
            sprintf('categoryBySlug|%s|%s', $slug, implode('|', $relations)),
            Carbon::now()->addHours(1),
            fn () =>
            $this->getModel()
            ->where('slug', $slug)
            ->when($relations, fn ($query) => $query->with($relations))
            ->firstOrFail()
        );
    }
}