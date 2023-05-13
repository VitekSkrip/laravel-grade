<?php

namespace App\Contracts\Services\TestDrives;

use App\Models\TestDrive;

interface TestDrivesRemoverServiceContract
{
    public function delete(int $id);
}
