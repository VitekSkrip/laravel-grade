<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Category;

interface CategoriesRepositoryContract
{
    public function getTree(?int $maxDepth = null): Collection;

    public function getModel(): Category;
}
