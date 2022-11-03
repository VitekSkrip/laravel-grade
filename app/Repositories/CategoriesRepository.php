<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function __construct(private Category $model)
    {
        
    }

    public function getModel(): Category
    {
        return $this->model;
    }

    public function getTree(?int $maxDepth = null): Collection
    {
        return $this->getModel()
            ->withDepth()
            ->when($maxDepth, fn ($query) => $query->having('depth', '<=', $maxDepth))
            ->get()
            ->toTree()
        ;
    }
}