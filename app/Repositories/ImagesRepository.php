<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ImagesRepository implements ImagesRepositoryContract
{
    public function __construct(private Image $model)
    {
        
    }

    private function getModel(): Image
    {
        return $this->model;
    }

    public function create(File | string $file): Image
    {
        return $this->getModel()->create(['path' => $this->save($file)]);
    }

    public function save(File | string $file): String
    {
        if (! $file instanceof File) {
            $file = new File($file);
        };

        return Storage::disk('public')->putFile('articles', $file);
    }
}
