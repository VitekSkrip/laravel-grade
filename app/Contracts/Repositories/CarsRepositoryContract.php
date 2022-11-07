<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CarsRepositoryContract
{
    public function getModel(): Car;
    
    public function findAll(): Collection;

    public function findForHomePage(int $limit): Collection;

    public function getById(int $id): Car;

    public function paginateForCatalog(
        array $allCategories,
        int $perPage = 10,
        array $fields = ['*'],
        string $pageName = 'page',
        int $page = 1,
    ): LengthAwarePaginator;
}
