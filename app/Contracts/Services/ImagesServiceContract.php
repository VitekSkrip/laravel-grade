<?php

namespace App\Contracts\Services;

use App\Models\Image;

interface ImagesServiceContract
{
   public function create(): Image;

   public function save(): String;
}
