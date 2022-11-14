<?php

namespace App\Contracts\Services;

interface CreateArticleServiceContract
{
    public function create(array $fields, array $tags): void;
}
