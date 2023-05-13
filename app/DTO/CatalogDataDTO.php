<?php

namespace App\DTO;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CatalogDataDTO
{
    public function __construct(
        public readonly CatalogFilterDTO $filter,
        public readonly LengthAwarePaginator $cars,
        public readonly ?Category $currentCategory
    ) {
    }
}
