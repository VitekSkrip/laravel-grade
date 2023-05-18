<?php

namespace App\Contracts\Services\Callbacks;

use App\Models\Callback;

interface CallbacksUpdateServiceContract
{
    public function update(int $id, array $fields): Callback;
}
