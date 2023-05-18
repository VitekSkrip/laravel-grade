<?php

namespace App\Contracts\Repositories;

use App\Models\TestDrive;
use Illuminate\Support\Collection;

interface TestDrivesRepositoryContract
{
    public function getModel(): TestDrive;

    public function create(array $fields): TestDrive;

    public function getByStatus(string $status): Collection;

    public function findAll(): Collection;

    public function update(TestDrive $testDrive, array $fields): TestDrive;

    public function findById(int $id, array $withRelations = []): TestDrive;

    public function delete(int $id);
}
