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

    public function create(User $user, array $fields = []): Model
    {
        return $user->orders()->firstOrCreate($fields);
    }

    public function findWhichNotPaid(): Collection
    {
        return $this->getModel()
            ->whereIn('payment_status', [OrderPaymentStatus::PAYMENT_ERROR->value, OrderPaymentStatus::NOT_PAID->value])
            ->get()
        ;
    }

    public function updateStatus(int $orderId, OrderPaymentStatus $status): Order
    {
        $order = $this->findById($orderId);
        $order->update(['payment_status' => $status->value]);
        return $order;
    }
}
