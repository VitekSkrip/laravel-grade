<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    public function findAll(): array;

    public function findSomeRandoms(int $limit, bool $isRandom): array;
}
