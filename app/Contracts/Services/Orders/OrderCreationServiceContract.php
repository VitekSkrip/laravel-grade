<?php

namespace App\Contracts\Services\Orders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface OrderCreationServiceContract
{
    public function create(User $user, array $fields = []): Model;
}
