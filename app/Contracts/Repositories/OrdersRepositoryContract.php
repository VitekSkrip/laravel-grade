<?php

namespace App\Contracts\Repositories;

use App\Enums\OrderPaymentStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface OrdersRepositoryContract
{
    public function getModel(): Order;

    public function find(User $user): Collection;

    public function findById(int $id, array $withRelations = []): Order;

    public function create(User $user, array $fields = []): Model;

    public function findWhichNotPaid(): Collection;

    public function updateStatus(int $orderId, OrderPaymentStatus $status): Order;

    public function findAll(): Collection;
}
