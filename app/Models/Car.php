<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Services\HasTags;

class Car extends Model implements HasTags
{
    use HasFactory;
    protected $fillable = ['name', 'engine_id', 'class_id', 'body_id'];
    
    public function getCars()
    {
        return $this->get();
    }

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
      
      public function tags()
      {
        return $this->morphToMany(Tag::class, 'taggable');
      }
}
