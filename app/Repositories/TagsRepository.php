<?php

namespace App\Repositories;

use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;
use Illuminate\Support\Collection;
use App\Contracts\Services\HasTagsContract;

class TagsRepository implements TagsRepositoryContract
{
    public function __construct(private Tag $model)
    {
        
    }

    private function getModel(): Tag
    {
        return $this->model;
    }

    public function getFirstOrCreate(string $name): Tag
    {
        return $this->getModel()->firstOrCreate(['name' => $name]);
    }

    public function syncTags(HasTagsContract $model, array $tags)
    {
        $model->tags()->sync($tags);
    }

    public function deleteUnusedTags()
    {
        $this->getModel()->whereDoesntHave('articles')->delete();
    }
}
