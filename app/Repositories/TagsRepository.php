<?php

namespace App\Repositories;

use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsRepository implements TagsRepositoryContract
{
    public function __construct(private Tag $tag)
    {
        
    }

    public function findAll(): Collection
    {
        return $this->getTag()->get();
    }

    public function getTag(): Tag
    {
        return $this->tag;
    }
}
