<?php

namespace App\Repositories;

use App\Contracts\Repositories\CallbacksRepositoryContract;
use App\Models\Callback;
use Illuminate\Support\Collection;

class CallbacksRepository implements CallbacksRepositoryContract
{
    public function __construct(private readonly Callback $callback)
    {

    }

    public function getModel(): Callback
    {
        return $this->callback;
    }

    public function findById(int $id): Callback
    {
        return $this->getModel()->findOrFail($id);
    }

    public function create(array $fields): Callback
    {
        return $this->getModel()->create($fields);
    }

    public function getByStatus(string $status): Collection
    {
        return $this->getModel()->where('status', $status)->get();
    }

    public function findAll(): Collection
    {
       return $this->getModel()->get();
    }

    public function update(Callback $callback, array $fields): Callback
    {
        $callback->update($fields);

        return $callback;
    }

    public function delete(Callback $callback): void
    {
        $callback->delete();
    }
}
