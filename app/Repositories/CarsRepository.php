<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    use FlushesCache;

    public function __construct(private readonly Car $model)
    {
    }

    protected function cacheTags(): array
    {
        return ['cars'];
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForMainPage(int $limit): Collection
    {
        return Cache::tags(['cars', 'images'])->remember(
            "mainPageCars|$limit",
            3600,
            fn () => $this->getModel()->with('image')->limit($limit)->get()
        );
    }

    public function findForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ['*'],
    ): Collection {
        return  $this->catalogQuery($catalogFilterDTO)->get($fields);
    }

    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ['*'],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator {
        return Cache::tags(['cars', 'images'])->remember(
            sprintf(
                'paginateForCatalog|%s',
                serialize([
                    'filter' => $catalogFilterDTO,
                    'fields' => $fields,
                    'perPage' => $perPage,
                    'page' => $page,
                    'pageName' => $pageName,
                    'relations' => $relations,
                ])
            ),
            3600,
            fn () => $this->catalogQuery($catalogFilterDTO)->with($relations)->paginate($perPage, $fields, $pageName, $page)
        );
    }

    private function catalogQuery(CatalogFilterDTO $catalogFilterDTO)
    {
        return $this
            ->getModel()
            ->when($catalogFilterDTO->getModel() !== null, fn ($query) => $query->where('name', 'like', '%' . $catalogFilterDTO->getModel() . '%'))
            ->when($catalogFilterDTO->getMinPrice(), fn ($query) => $query->where('price', '>=', $catalogFilterDTO->getMinPrice()))
            ->when($catalogFilterDTO->getMaxPrice(), fn ($query) => $query->where('price', '<=', $catalogFilterDTO->getMaxPrice()))
            ->when($catalogFilterDTO->getOrderPrice() !== null, fn ($query) => $query->orderBy('price', $catalogFilterDTO->getOrderPrice()))
            ->when($catalogFilterDTO->getOrderModel() !== null, fn ($query) => $query->orderBy('name', $catalogFilterDTO->getOrderModel()))
            ->when($catalogFilterDTO->getAllCategories(), fn ($query) => $query->whereHas('category', fn ($query) => $query->whereIn('id', $catalogFilterDTO->getAllCategories())))
        ;
    }

    public function getById(int $id, array $relations = []): Car
    {
        return Cache::tags(['cars', 'images', 'tags', 'carBodies', 'carEngines', 'carClasses', 'category'])->remember(
            sprintf('carById|%s|%s', $id, implode('|', $relations)),
            3600,
            fn () => $this->getModel()
                ->when($relations, fn ($query) => $query->with($relations))
                ->findOrFail($id)
        );
    }

    public function create(array $fields): Car
    {
        return $this->getModel()->create($fields);
    }

    public function update(Car $car, array $fields): Car
    {
        $car->update($fields);

        return $car;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function syncCategories(Car $car, array $categories): Car
    {
        $car->categories()->sync($categories);
        return $car;
    }

    public function getModel(): Car
    {
        return $this->model;
    }
}
