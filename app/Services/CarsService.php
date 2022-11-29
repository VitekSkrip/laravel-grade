<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoverServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Models\Car;

class CarsService implements CarCreationServiceContract, CarRemoverServiceContract, CarUpdateServiceContract
{
    public function __construct(private CarsRepositoryContract $carsRepository)
    {
        
    }

    // public function create(array $fields, string $category = null): Car
    public function create(array $fields): Car
    {
        $car = $this->carsRepository->create($fields);

        // if (! empty($category)) {
        //     $this->carsRepository->syncCategory($car, $category);
        // }

        return $car;
    }

    public function update(int $id, array $fields, ?string $category = null): Car
    {
        $car = $this->carsRepository->getById($id);

        $this->carsRepository->update($car, $fields);

        // if ($category !== null) {
        //     $this->carsRepository->syncCategory($car, $category);
        // }

        return $car;
    }

    public function delete(int $id)
    {
        $this->carsRepository->delete($id);
    }
}
