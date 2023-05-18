<?php

namespace App\Contracts\Services\Callbacks;

interface CallbacksRemoverServiceContract
{
    public function delete(int $id): void;
}
