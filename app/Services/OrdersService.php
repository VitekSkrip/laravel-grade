<?php

namespace App\Services;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\Orders\OrderCreationServiceContract;
use App\Contracts\Services\Orders\OrderRemoverServiceContract;
use App\Contracts\Services\Orders\OrderUpdateServiceContract;
use App\Enums\OrderPaymentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OrdersService implements OrderCreationServiceContract, OrderUpdateServiceContract, OrderRemoverServiceContract
{
    public function __construct(
        private readonly OrdersRepositoryContract $ordersRepository
    ) {
    }

    public function create(User $user, array $fields = []): Model
    {
        return $this->ordersRepository->create($user, array_merge($fields, ['payment_status' => OrderPaymentStatus::NOT_PAID->value]));
    }

    public function update(int $id, array $fields): Model
    {
        $order = $this->ordersRepository->findById($id);

        $this->ordersRepository->update($order, $fields);

        return $order;
    }

    public function delete(int $id): void
    {
        $order = $this->ordersRepository->findById($id);

        $this->ordersRepository->delete($order);
    }
}
