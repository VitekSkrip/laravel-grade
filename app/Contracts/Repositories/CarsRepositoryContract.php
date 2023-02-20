<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CarsRepositoryContract
{
    public function findForHomePage(int $limit): Collection;

    public function getById(int $id): Car;

    public function paginateForCatalog(
        array $allCategories,
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator;

    public function getCount(): int;

    public function create(array $fields): Car;

    public function update(Car $car, array $fields): Car;

    public function delete(int $id);
}
