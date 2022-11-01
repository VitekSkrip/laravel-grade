<?php

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTagsContract
{
    public function tags(): MorphToMany;
}
