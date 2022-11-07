<?php

namespace App\Services;


use App\Models\Image;
use App\Contracts\Services\ImagesServiceContract;
use App\Repositories\ImagesRepository;
use Illuminate\Support\Facades\Storage;

class ImagesService implements ImagesServiceContract
{
    public function __construct(private ImagesRepository $imagesRepository)
    {
        
    }

    public function create(): Image
    {
        return $this->imagesRepository->create();
    }

    public function save(): string
    {

        return Storage::disk('public')->putFile('', $file);
    }
}
