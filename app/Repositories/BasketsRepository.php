<?php

namespace App\Repositories;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Models\Basket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class BasketsRepository implements BasketsRepositoryContract
{
    public function __construct(
        private Basket $basket,
    ) {
    }

    public function getModel(): Basket
    {
        return $this->basket;
    }

    public function findBasketByUserId(int $userId): Basket
    {
        return $this->getModel()::firstOrCreate(['user_id' => $userId]);
    }

    public function findProducts(int $userId, $withRelations = []): Collection
    {
        return $this->findBasketByUserId($userId)->cars()->with($withRelations)->get();
    }

    public function calculateTotalCost(Collection $products): int
    {
        return $products->map(function ($product) {
            return ['cost' => $product->price * $product->pivot->quantity];
        })->sum('cost');
    }

    public function calculateTotalQuantity(Collection $products): int
    {
        return $products->sum('pivot.quantity');
    }

    public function addProduct(int $userId, int $productId): Basket
    {
        $basket = $this->findBasketByUserId($userId);

        try {
            $currentProduct = $basket->cars()->where('id', $productId)->withPivot('quantity')->firstOrFail();
            $basket->cars()->updateExistingPivot($productId, ['quantity' => $currentProduct->pivot->quantity + 1]);
        } catch (ModelNotFoundException $exception) {
            $basket->cars()->attach($productId, ['quantity' => 1]);
        }

        return $basket;
    }

    public function deleteProduct(int $userId, int $productId): void
    {
        $basket = $this->findBasketByUserId($userId);
        $currentProduct = $basket->cars()->where('id', $productId)->withPivot('quantity')->firstOrFail();

        if ($currentProduct->pivot->quantity - 1 == 0) {
            $this->removeProduct($userId, $productId);
        } else {
            $basket->cars()->updateExistingPivot($productId, ['quantity' => $currentProduct->pivot->quantity - 1]);
        }
    }

    public function removeProduct(int $userId, int $productId): void
    {
        $basket = $this->findBasketByUserId($userId);
        $basket->cars()->detach($productId);
    }
}
