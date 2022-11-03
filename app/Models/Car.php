<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Contracts\Services\HasTagsContract;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Car extends Model implements HasTagsContract
{
    use HasFactory;
    protected $fillable = ['name', 'engine_id', 'class_id', 'body_id'];
    
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

      /**
      * Получить все теги машины.
      */
      
      public function tags(): MorphToMany
      {
        return $this->morphToMany(Tag::class, 'taggable');
      }

      public function categories(): BelongsToMany
      {
          return $this->belongsToMany(Category::class);
      }
}
