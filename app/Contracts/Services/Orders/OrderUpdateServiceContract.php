<?php

namespace App\Contracts\Services\Orders;

use Illuminate\Database\Eloquent\Model;

interface OrderUpdateServiceContract
{
    public function update(int $id, array $fields): Model;
}
