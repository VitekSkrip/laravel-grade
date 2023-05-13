<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }

    public function testDrives(): HasMany
    {
        return $this->hasMany(TestDrive::class);
    }
}
