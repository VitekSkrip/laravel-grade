<?php

namespace App\Services;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Repositories\CallbacksRepositoryContract;
use App\Contracts\Services\Baskets\AddProductToUserBasketServiceContract;
use App\Contracts\Services\Callbacks\CallbacksCreationServiceContract;
use App\Contracts\Services\Callbacks\CallbacksRemoverServiceContract;
use App\Contracts\Services\Callbacks\CallbacksUpdateServiceContract;
use App\Models\Basket;
use App\Models\Callback;
use App\Models\User;

class UserBasketService implements AddProductToUserBasketServiceContract
{
    public function __construct(
        private readonly BasketsRepositoryContract $basketsRepository,
    ) {
    }

    public function addProduct(User $user, Product $product): Basket
    {
        // TODO: Implement addProduct() method.
    }
}
