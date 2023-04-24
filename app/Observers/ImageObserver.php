<?php

namespace App\Observers;

use App\Models\Image;
use Illuminate\Support\Facades\Log;

class ImageObserver
{
    /**
     * Handle the Image "created" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function created(Image $image)
    {
        Log::channel('imagesInfo')->info('New image created', ['image' => $image->toArray()]);
    }

    /**
     * Handle the Image "updated" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function updated(Image $image)
    {
        Log::channel('imagesInfo')->info('Image updated', ['image' => $image->toArray()]);
    }

    /**
     * Handle the Image "deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function deleted(Image $image)
    {
        Log::channel('imagesInfo')->info('Image deleted', ['image' => $image->toArray()]);
    }
}
