<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(private readonly Car $model)
    {
        
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getModel(): Car
    {
        return $this->model;
    }
}
