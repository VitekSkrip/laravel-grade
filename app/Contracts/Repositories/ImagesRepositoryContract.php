<?php

namespace App\Contracts\Repositories;

use App\Models\Image;
use Illuminate\Http\File;

interface ImagesRepositoryContract
{
    public function create(string $dir, File | string $file): Image;

    public function save(string $dir, File | string $file): String;
}
