<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_status',
        'total_cost',
        'total_quantity'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
