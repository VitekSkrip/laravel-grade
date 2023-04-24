<?php

namespace App\Contracts\Services;

use App\Contracts\HasTagsContract;

interface TagsSynchronizerServiceContract
{
    public function sync(HasTagsContract $model, array $tags);
}
