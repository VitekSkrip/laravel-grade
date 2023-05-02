<?php

namespace App\Contracts\Services;

interface RolesServiceContract
{
    public function userHasRole(int $userId, string $role): bool;

    public function userIsAdmin(int $userId): bool;

    public function userIsManager(int $userId): bool;
}
