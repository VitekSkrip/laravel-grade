<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    use FlushesCache;
    
    public function __construct(private Car $model)
    {
        
    }

    protected function cacheTags(): array
    {
        return ['cars'];
    }

    public function findForHomePage(int $limit): Collection
    {
        return Cache::tags(['cars', 'images'])->remember("homePageCars|$limit", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->with('image')->where('is_new', true)->limit($limit)->get()
        );
    }

    private function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id): Car
    {
        return Cache::tags(['cars', 'images'])->remember("carById|$id", Carbon::now()->addHours(1), fn () =>
            $this->getModel()->with(['carClass', 'engine', 'carBody', 'imagesCatalog'])->findOrFail($id)
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

        return Cache::tags(['cars', 'images'])->remember("paginateForCatalog|$params", Carbon::now()->addHours(1), fn () => 
            $this->catalogBuilder($allCategories)->with(['image'])->paginate($perPage, $fields, $pageName, $page)
        );
    }

    private function catalogBuilder(array $allCategories)
    {
        return $this->getModel()
            ->when($allCategories, fn($query) => $query->whereHas('categories', fn($query) => $query->whereIn('id', $allCategories)))
        ;
    }
}
