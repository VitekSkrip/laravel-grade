<?php

namespace App\Contracts\Services\Articles;

interface ArticleUpdateServiceContract
{
    public function update(string $slug, array $fields, array $tags): void;
}
