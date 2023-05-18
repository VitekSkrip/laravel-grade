<?php

namespace App\DTO;

use App\Models\Category;

class CatalogFilterDTO
{
    private ?string $model = null;
    private int $minPrice = 0;
    private int $maxPrice = 0;
    private ?string $orderPrice = null;
    private ?string $orderModel = null;
    private array $allCategories = [];

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): static
    {
        $this->model = $model;
        return $this;
    }

    public function getMinPrice(): int
    {
        return $this->minPrice;
    }

    public function setMinPrice(?int $minPrice): static
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?int $maxPrice): static
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    public function getOrderPrice(): ?string
    {
        return $this->orderPrice;
    }

    public function setOrderPrice(?string $orderPrice): static
    {
        if ($orderPrice !== null) {
            $orderPrice = $orderPrice === 'desc' ? 'desc' : 'asc';
        }

        $this->orderPrice = $orderPrice;
        return $this;
    }

    public function getOrderModel(): ?string
    {
        return $this->orderModel;
    }

    public function setOrderModel(?string $orderModel): static
    {
        if ($orderModel !== null) {
            $orderModel = $orderModel === 'desc' ? 'desc' : 'asc';
        }

        $this->orderModel = $orderModel;
        return $this;
    }

    public function getAllCategories(): array
    {
        return $this->allCategories;
    }

    public function setAllCategories(array $allCategories): static
    {
        $this->allCategories = $allCategories;
        return $this;
    }

    public function forCategory(Category $category): static
    {
        return $this->setAllCategories(
            $category
                ->descendants
                ->pluck('id')
                ->push($category->id)
                ->toArray()
        );
    }
}
