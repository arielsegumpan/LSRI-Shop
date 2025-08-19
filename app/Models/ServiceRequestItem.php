<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceRequestItem extends Model
{
    // public $incrementing = true;
    protected $fillable = [
        'service_request_id',
        'service_id',
        'quantity',
        'subtotal_price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'subtotal_price' => 'float',
    ];

    public function serviceRequest() : BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id', 'id');
    }

    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
