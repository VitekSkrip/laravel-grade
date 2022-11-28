<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\DTO\ApiSalonModel;
use Illuminate\Support\Collection;

class SalonsRepository implements SalonsRepositoryContract
{
    public function __construct(private SalonsClientServiceContract $salonsClientService)
    {

    }

    public function find(): Collection
    {
        $salons = collect();

        foreach($this->salonsClientService->find() as $salon) {
            $salons->push($this->createModelFromResponseItem($salon));
        }

        return $salons;
    }

    // public function getById(int $id): ApiSalonModel
    // {
    //     $salon = $this->salonsClientService->findById($id);

    //     return $this->createModelFromResponseItem($salon);
    // }

    private function createModelFromResponseItem(array $salon): ApiSalonModel
    {
        return new ApiSalonModel(
            $salon['name'],
            $salon['image'],
            $salon['address'],
            $salon['phone'],
            $salon['work_hours'],
        );
    }
}
