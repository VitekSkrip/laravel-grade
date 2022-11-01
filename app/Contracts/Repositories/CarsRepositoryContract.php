<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Car;

interface CarsRepositoryContract
{
    public function getModel(): Car;
    
    public function findAll(): Collection;

    public function findForHomePage(int $limit): Collection;

    public function getById(int $id): Car;
}
