<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use App\Enums\ModelStatus;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model implements HasTagsContract
{
    use HasFactory;
    use SoftDeletes;
    use WithoutAncients;

    protected $fillable = ['name', 'price', 'old_price', 'description', 'salon', 'kpp', 'year', 'color', 'is_new', 'characteristics', 'status', 'engine_id', 'class_id', 'body_id', 'image_id'];

    protected $attributes = [
        'is_new' => true,
    ];

    protected $casts = [
        'price' => 'int',
        'old_price' => 'int',
        'is_new' => 'bool',
        'characteristics' => 'array',
        'status' => ModelStatus::class,
    ];

    protected $appends = ['discount_sum'];

    public function discountSum(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => isset($attributes['old_price']) ? $attributes['old_price'] - $attributes['price'] : null
        );
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function salons(): BelongsToMany
    {
        return $this->belongsToMany(Salon::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image?->url ?: '/assets/images/no_image.png');
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function name(): Attribute
    {
        return Attribute::set(fn ($value) => ucfirst($value));
    }

    public function scopeHasDiscount(Builder $query): Builder
    {
        return $query->whereNotNull('old_price');
    }

    public function scopeNovelty(Builder $query): Builder
    {
        return $query->where('is_new', true);
    }

    public function scopeMinPrice(Builder $query, int $minPrice): Builder
    {
        return $query->where('price', '>=', $minPrice);
    }

    public function newCollection(array $models = []): Collection
    {
        return new CarCollection($models);
    }

    public function carClass(): BelongsTo
    {
        return $this->belongsTo(CarClass::class, 'class_id')->withDefault();
    }

    public function engine(): BelongsTo
    {
        return $this->belongsTo(CarEngine::class)->withDefault(['name' => 'Не указан']);
    }

    public function body(): BelongsTo
    {
        return $this->belongsTo(CarBody::class)->withDefault();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function fixedProducts(): HasMany
    {
        return $this->hasMany(FixedProduct::class, 'car_id', 'id');
    }

    public function testDrives(): HasMany
    {
        return $this->hasMany(TestDrive::class);
    }
}
