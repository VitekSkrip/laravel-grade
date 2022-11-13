<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface UpdateArticleServiceContract
{
    public function update(string $slug, array $fields, array $tags);
}
