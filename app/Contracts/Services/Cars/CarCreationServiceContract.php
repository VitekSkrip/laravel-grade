<?php

namespace App\Contracts\Services\Cars;

use App\Models\Car;

interface CarCreationServiceContract
{
    public function create(array $fields, int $categoryId): Car;
}
