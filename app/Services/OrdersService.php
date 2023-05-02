<?php

namespace App\Services;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Enums\OrderPaymentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private readonly OrdersRepositoryContract $ordersRepository
    ) {
    }

    public function findOrders(User $user): Collection
    {
        return $this->ordersRepository->find($user);
    }

    public function createOrder(User $user, array $fields = []): Model
    {
        return $this->ordersRepository->create($user, array_merge($fields, [
            'payment_status' => OrderPaymentStatus::NOT_CHECKED->value,
        ]));
    }
}
