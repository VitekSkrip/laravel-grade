<?php

namespace App\Contracts\Repositories;
use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
    public function findAll(): Collection;

    public function findSomeRandoms(int $limit, bool $isRandom): Collection;
}
