<?php

namespace App\Contracts\Repositories;
use Illuminate\Support\Collection;

interface SalonsRepositoryContract
{
    public function find(): Collection;
}
