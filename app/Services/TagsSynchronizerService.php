<?php

namespace App\Services;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;

class TagsSynchronizerService implements TagsSynchronizerServiceContract
{
    public function __construct(private readonly TagsRepositoryContract $tagsRepository)
    {
    }

    public function sync(HasTagsContract $model, array $tags)
    {
        $tagsToSync = collect();

        foreach ($tags as $tag) {
            $tagsToSync->push($this->tagsRepository->firstOrCreateByName($tag));
        }

        $this->tagsRepository->syncTags($model, $tagsToSync->pluck('id')->all());

        $this->tagsRepository->deleteUnusedTags();
    }
}
