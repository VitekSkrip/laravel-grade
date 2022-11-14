<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;
use App\Contracts\Services\HasTagsContract;

interface TagsSynchronizerServiceContract
{
   public function sync(HasTagsContract $model, array $tags);
}
