<?php

namespace App\Models;

use App\Contracts\HasTagsContract;
use App\Enums\CallbackStatus;
use App\Enums\ModelStatus;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestDrive extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['client_name', 'client_phone', 'more_info', 'status', 'car_id', 'salon_id'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }
}
