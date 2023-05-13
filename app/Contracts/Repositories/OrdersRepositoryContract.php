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

    public function findWhichNotPaid(array $withRelations = []): Collection;

    public function findAll(array $withRelations = []): Collection;

    public function create(User $user, array $fields = []): Model;

    public function update(Order $order, array $fields): Order;

    public function delete(Order $order): void;
}
