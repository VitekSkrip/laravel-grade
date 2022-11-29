<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface CarCreationServiceContract
{
    // public function create(array $fields, string $category = null): Car;
    public function create(array $fields): Car;
}