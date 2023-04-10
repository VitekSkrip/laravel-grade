<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function cars(): HasMany
    {
        return $this->HasMany(Car::class);
    }

    public function articles(): HasMany
    {
        return $this->HasMany(Article::class);
    }

    public function getUrl(): string
    {
        return "/storage/{$this->path}";
    }

    public function banner(): HasOne
    {
        return $this->hasOne(Banner::class);
    }
}
