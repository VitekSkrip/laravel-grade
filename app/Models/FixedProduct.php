<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FixedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'car_id',
        'image_id'
    ];

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image?->url ?: '/assets/images/no_image.png');
    }

    public function name(): Attribute
    {
        return Attribute::set(fn ($value) => ucfirst($value));
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
