<?php

namespace App\Repositories;

use App\Contracts\Repositories\TestDrivesRepositoryContract;
use App\Models\TestDrive;
use Illuminate\Support\Collection;

class TestDrivesRepository implements TestDrivesRepositoryContract
{
    public function __construct(private readonly TestDrive $testDrive)
    {

    }

    public function getModel(): TestDrive
    {
        return $this->testDrive;
    }

    public function findById(int $id, array $withRelations = []): TestDrive
    {
        return $this->getModel()->where('id', $id)->with($withRelations)->first();
    }

    public function create(array $fields): TestDrive
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

    public function update(TestDrive $testDrive, array $fields): TestDrive
    {
        $testDrive->update($fields);

        return $testDrive;
    }

    public function delete(int $id)
    {
        return $this->findById($id)->delete();
    }
}
