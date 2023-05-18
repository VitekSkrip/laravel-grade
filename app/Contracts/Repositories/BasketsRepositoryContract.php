<?php

namespace App\Contracts\Repositories;

use App\Models\Basket;
use Illuminate\Support\Collection;

interface BasketsRepositoryContract
{
    public function getModel(): Basket;

    public function findBasketByUserId(int $userId): Basket;

    public function findProducts(int $userId, $withRelations = []): Collection;

    public function addProduct(int $userId, int $productId): Basket;

    public function deleteProduct(int $userId, int $productId): void;

    public function removeProduct(int $userId, int $productId): void;

    public function calculateTotalCost(Collection $products): int;

    public function calculateTotalQuantity(Collection $products): int;
}
