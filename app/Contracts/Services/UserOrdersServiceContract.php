<?php

namespace App\Contracts\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserOrdersServiceContract
{
    public function findOrders(User $user): Collection;

    public function createOrder(User $user, array $fields = []): Model;
}
