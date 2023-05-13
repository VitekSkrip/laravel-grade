<?php

namespace App\DTO;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BasketProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly int $quantity
    ) {
    }
}
