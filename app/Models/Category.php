<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['name', 'slug']; 

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
