<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(private Car $model)
    {
        
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForHomePage($limit): Collection
    {
        return $this->getModel()->where('is_new', true)->limit(4)->get();
    }

    public function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id): Car
    {
        return $this->getModel()->findOrFail($id);
    }
}
