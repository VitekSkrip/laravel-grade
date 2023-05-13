<?php

namespace App\Contracts\Services\Orders;

interface OrderRemoverServiceContract
{
    public function delete(int $id): void;
}
