<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Enums\OrderPaymentStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrdersRepository implements OrdersRepositoryContract
{
    public function __construct(
        private Order $order,
    ) {
    }

    public function getModel(): Order
    {
        return $this->order;
    }

    public function find(User $user): Collection
    {
        return $user->orders;
    }

    public function findById(int $id, array $withRelations = []): Order
    {
        return $this->getModel()->where('id', $id)->with($withRelations)->firstOrFail();
    }

    public function findAll(array $withRelations = []): Collection
    {
        return $this->getModel()->with($withRelations)->get();
    }

    public function findWhichNotPaid(array $withRelations = []): Collection
    {
        return $this->getModel()
            ->whereIn('payment_status', [OrderPaymentStatus::PAYMENT_ERROR->value, OrderPaymentStatus::NOT_PAID->value])
            ->get()
        ;
    }

    public function create(User $user, array $fields = []): Model
    {
        return $user->orders()->firstOrCreate($fields);
    }

    public function update(Order $order, array $fields): Order
    {
        $order->update($fields);
        return $order;
    }

    public function delete(Order $order): void
    {
        $order->delete();
    }
}
