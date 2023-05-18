<?php

namespace App\Services;

use App\Contracts\Repositories\RolesRepositoryContract;
use App\Contracts\Services\RolesServiceContract;

class RolesService implements RolesServiceContract
{
    public function __construct(private readonly RolesRepositoryContract $rolesRepository)
    {
    }

    public function userHasRole(int $userId, string $role): bool
    {
        return $this->rolesRepository->hasRole($userId, $role);
    }

    public function userIsAdmin(int $userId): bool
    {
        return $this->userHasRole($userId, 'admin');
    }

    public function userIsManager(int $userId): bool
    {
        return $this->userHasRole($userId, 'manager');
    }
}
