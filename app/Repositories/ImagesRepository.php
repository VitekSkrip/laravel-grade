<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ImagesRepository implements ImagesRepositoryContract
{
    use FlushesCache;
    
    public function __construct(private Image $model)
    {
        
    }

    protected function cacheTags(): array
    {
        return ['images'];
    }

    private function getModel(): Image
    {
        return $this->model;
    }

    public function create(string $dir, File | string $file): Image
    {
        return $this->getModel()->create(['path' => $this->save($dir, $file)]);
    }

    public function save(string $dir, File | string $file,): String
    {
        if (! $file instanceof File) {
            $file = new File($file);
        };

        return Storage::disk('public')->putFile($dir, $file);
    }
}
