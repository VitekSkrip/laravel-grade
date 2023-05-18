<?php

namespace App\Contracts\Services\TestDrives;

use App\Models\TestDrive;

interface TestDrivesUpdateServiceContract
{
    public function update(int $id, array $fields): TestDrive;
}
