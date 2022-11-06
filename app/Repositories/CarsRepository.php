<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function findForHomePage(int $limit): Collection
    {
        return $this->getModel()->where('is_new', true)->limit($limit)->get();
    }

    private function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id): Car
    {
        return $this->getModel()->findOrFail($id);
    }

    public function paginateForCatalog(int $perPage = 10, array $fields = ['*'], string $pageName = 'page', int $page = 1): LengthAwarePaginator
    {
        return $this->getModel()->paginate($perPage, $fields, $pageName, $page);
    }
}
