<?php

namespace App\Contracts\Services\Baskets;

use App\Models\Basket;
use App\Models\User;

interface AddProductToUserBasketServiceContract
{
    public function addProduct(User $user, int $productId): Basket;
}
