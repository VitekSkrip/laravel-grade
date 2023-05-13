<?php

namespace App\Contracts\Services\Callbacks;

use App\Models\Callback;

interface CallbacksCreationServiceContract
{
    public function create(array $fields): Callback;
}
