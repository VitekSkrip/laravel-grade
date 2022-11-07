<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Image;
use Illuminate\Http\File;

interface ImagesRepositoryContract
{
    public function create(File | string $file): Image;

    public function save(File | string $file): String;
}
