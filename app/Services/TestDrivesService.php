<?php

namespace App\Services;

use App\Contracts\Repositories\TestDrivesRepositoryContract;
use App\Contracts\Services\TestDrives\TestDrivesCreationServiceContract;
use App\Contracts\Services\TestDrives\TestDrivesRemoverServiceContract;
use App\Contracts\Services\TestDrives\TestDrivesUpdateServiceContract;
use App\Models\TestDrive;

class TestDrivesService implements TestDrivesCreationServiceContract, TestDrivesUpdateServiceContract,TestDrivesRemoverServiceContract
{
    public function __construct(
        private readonly TestDrivesRepositoryContract $testDrivesRepository,
    ) {
    }

    public function create(array $fields): TestDrive
    {
        return $this->testDrivesRepository->create($fields);
    }

    public function update(int $id, array $fields): TestDrive
    {
        $testDrive = $this->testDrivesRepository->findById($id);

        $this->testDrivesRepository->update($testDrive, $fields);

        return $testDrive;
    }

    public function delete(int $id)
    {
        $this->testDrivesRepository->delete($id);

    }
}
