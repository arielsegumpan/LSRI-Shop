<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourierRate extends Model
{
    protected $fillable = [
        'courier_id',
        'rate',
        'min_km',
        'max_km',
        'rate_per_km',
        'rate_type',
        'rate_status',
        'rate_description',
    ];

    protected $casts = [
        'rate' => 'decimal:2',
    ];

    public function courier() : BelongsTo
    {
        return $this->belongsTo(Courier::class);
    }
}
