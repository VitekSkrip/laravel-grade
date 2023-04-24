<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarEngine extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $touches = ['cars'];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'engine_id');
    }

    public function cheapestCar(): HasOne
    {
        return $this->hasOne(Car::class, 'engine_id')->ofMany('price', 'min');
    }

    public function theMostExpensiveCar(): HasOne
    {
        return $this->hasOne(Car::class, 'engine_id')->ofMany('price', 'max');
    }

    public function carClasses(): HasManyThrough
    {
        return $this->hasManyThrough(
            CarClass::class,
            Car::class,
            'engine_id',
            'id',
            'id',
            'class_id',
        );
    }
}
