<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Contracts\Services\HasTagsContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Car extends Model implements HasTagsContract
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'old_price', 'body', 'engine_id', 'class_id', 'body_id', 'image_id', 'category_id'];
    
    public function carClass(): BelongsTo
    {
        return $this->belongsTo(CarClass::class, 'class_id');
    }

    public function engine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function carBody(): BelongsTo
    {
        return $this->belongsTo(CarBody::class, 'body_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function imagesCatalog(): BelongsToMany
    {
        return $this->belongsToMany(Image::class); 
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
