<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Tag;

interface TagsRepositoryContract
{
    public function getTag(): Tag;
    
    public function findAll(): Collection;
}
