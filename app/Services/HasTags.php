<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface HasTags
{
    public function tags(): MorphToMany;
}
