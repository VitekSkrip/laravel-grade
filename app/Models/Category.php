<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['slug', 'name'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function cars(): HasMany
    {
        return $this->HasMany(Car::class);
    }
}
