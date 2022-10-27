<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\HasTags;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTags
{
    use HasFactory;
    protected $dates = ['published_at'];
    public $fillable = ['title', 'description', 'body', 'slug', 'published_at'];

    /**
      * Получить все теги новости.
      */
      
      public function tags(): MorphToMany
      {
        return $this->morphToMany(Tag::class, 'taggable');
      }
}
