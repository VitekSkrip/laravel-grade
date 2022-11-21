<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
