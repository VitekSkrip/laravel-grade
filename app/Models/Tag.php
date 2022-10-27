<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Получить все новости, которым присвоен этот тег.
     */

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
    