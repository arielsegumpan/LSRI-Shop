<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'service_name',
        'service_slug',
        'service_price',
        'service_standard_labor',
        'service_warranty_period_days',
        'service_description',
    ];

    protected $casts = [
        'service_description' => 'array',
        'service_warranty_period_days' => 'integer',
        'service_price' => 'float',
        'service_standard_labor' => 'float',
    ];

    public function requestItems() : HasMany
    {
        return $this->hasMany(ServiceRequestItem::class, 'service_id', 'id');
    }

    // public function serviceRequests() : HasMany
    // {
    //     return $this->hasMany(ServiceRequest::class);
    // }

}
