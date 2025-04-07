<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courier extends Model
{

    protected $fillable = [
        'courier_name',
        'courier_img',
        'courier_description',
    ];

    public function courierRates() : HasMany
    {
        return $this->hasMany(CourierRate::class);
    }
}
