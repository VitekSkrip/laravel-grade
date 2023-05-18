<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model implements HasTagsContract
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $fillable = ['title', 'description', 'body', 'slug', 'image', 'published_at', 'image_id'];

    protected $casts = [
        'published_at' => 'datetime:d M Y',
    ];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image?->url ?: '/assets/images/no_image.png');
    }
}
