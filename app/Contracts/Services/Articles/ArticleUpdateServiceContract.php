<?php

namespace App\Contracts\Services\Articles;

use App\Models\Article;

interface ArticleUpdateServiceContract
{
    public function update(string $slug, array $fields, array $tags): Article;
}
