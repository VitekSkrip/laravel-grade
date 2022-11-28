<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface CarUpdateServiceContract
{
    // public function update(int $id, array $fields, ?string $category = null): Car;
    public function update(int $id, array $fields): Car;
}
