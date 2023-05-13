<?php

namespace App\Contracts\Repositories;

use App\Models\Callback;
use Illuminate\Support\Collection;

interface CallbacksRepositoryContract
{
    public function getModel(): Callback;

    public function create(array $fields): Callback;

    public function getByStatus(string $status): Collection;

    public function findAll(): Collection;

    public function update(Callback $callback, array $fields): Callback;

    public function findById(int $id): Callback;

    public function delete(Callback $callback): void;
}
