<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Tag;
use App\Contracts\Services\HasTagsContract;

interface TagsRepositoryContract
{
    public function getModel(): Tag;

    public function getFirstOrCreate(string $name): Tag;

    public function syncTags(HasTagsContract $model, array $tags);

    public function deleteUnusedTags();
}
