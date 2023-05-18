<?php

namespace App\Contracts\Services\TestDrives;

use App\Models\TestDrive;

interface TestDrivesCreationServiceContract
{
    public function create(array $fields): TestDrive;
}
