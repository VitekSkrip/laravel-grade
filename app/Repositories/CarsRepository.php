<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

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
        return Cache::tags(['cars', 'images'])->remember("homePageCars|$limit", 3600, fn () =>
            $this->getModel()->with('image')->where('is_new', true)->limit($limit)->get()
        );
    }

    private function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id): Car
    {
        return Cache::tags(['cars', 'images'])->remember("carById|$id", 3600, fn () =>
            $this->getModel()->findOrFail($id)
        );
    }

    public function paginateForCatalog(array $allCategories, int $perPage = 10, array $fields = ['*'], string $pageName = 'page', int $page = 1): LengthAwarePaginator
    {
        $params = serialize([
                'categories' => $allCategories,
                'perPage' => $perPage,
                'fields' => $fields,
                'pageName' => $pageName,
                'page' => $page,
        ]);

        return Cache::tags(['cars', 'images'])->remember("paginateForCatalog|$params", 3600, fn () => 
            $this->catalogBuilder($allCategories)->paginate($perPage, $fields, $pageName, $page)
        );
    }

    private function catalogBuilder(array $allCategories)
    {
        return $this->getModel()
            ->when($allCategories, fn($query) => $query->whereHas('categories', fn($query) => $query->whereIn('id', $allCategories)))
        ;
    }
}
