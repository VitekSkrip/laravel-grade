<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract extends FlushCacheRepositoryContract
{
    public function getModel(): Car;

    public function findAll(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function findForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ['*'],
    ): Collection;

    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array $fields = ['*'],
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator;

    public function getById(int $id, array $relations = []): Car;

    public function create(array $fields): Car;

    public function syncCategories(Car $car, array $categories): Car;

    public function update(Car $car, array $fields): Car;

    public function delete(int $id): void;
}
