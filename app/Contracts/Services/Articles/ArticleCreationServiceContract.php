<?php

namespace App\Contracts\Services\Articles;

interface ArticleCreationServiceContract
{
    public function create(array $fields, array $tags): void;
}
