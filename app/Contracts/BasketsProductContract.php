<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface BasketsProductContract
{
    public function baskets(): MorphToMany;
}
