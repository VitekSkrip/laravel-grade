<?php

namespace App\Services;

use App\Contracts\Repositories\CallbacksRepositoryContract;
use App\Contracts\Services\Callbacks\CallbacksCreationServiceContract;
use App\Contracts\Services\Callbacks\CallbacksRemoverServiceContract;
use App\Contracts\Services\Callbacks\CallbacksUpdateServiceContract;
use App\Models\Callback;

class CallbacksService implements CallbacksCreationServiceContract, CallbacksRemoverServiceContract, CallbacksUpdateServiceContract
{
    public function __construct(
        private readonly CallbacksRepositoryContract $callbacksRepository,
    ) {
    }

    public function create(array $fields): Callback
    {
        return $this->callbacksRepository->create($fields);
    }

    public function update(int $id, array $fields): Callback
    {
        $callback = $this->callbacksRepository->findById($id);

        $this->callbacksRepository->update($callback, $fields);

        return $callback;
    }

    public function delete(int $id): void
    {
        $callback = $this->callbacksRepository->findById($id);

        $this->callbacksRepository->delete($callback);
    }
}
