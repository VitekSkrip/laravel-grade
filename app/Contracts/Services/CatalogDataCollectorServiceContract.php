<?php

namespace App\Contracts\Services;

use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;

interface CatalogDataCollectorServiceContract
{
    public function collectCatalogData(
        CatalogFilterDTO $catalogFilterDTO,
        ?string $slug,
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
    ): CatalogDataDTO;
}
