<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Tag;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $syncIds = [];

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
