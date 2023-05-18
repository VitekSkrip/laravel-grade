<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class CarCollection extends Collection
{
    public function descriptions($limit = 150): Collection|CarCollection|\Illuminate\Support\Collection
    {
        return $this->pluck('description')->trim($limit);
    }
}
