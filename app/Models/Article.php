<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];
    public $fillable = ['title', 'description', 'body', 'slug', 'published_at'];

    /**
      * Получить все теги новости.
      */
      
      public function tags()
      {
          return $this->morphToMany(Tag::class, 'taggable');
      }
}
