<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Woenel\Prpcmblmts\Models\PhilippineCity;
use Woenel\Prpcmblmts\Models\PhilippineRegion;
use Woenel\Prpcmblmts\Models\PhilippineBarangay;
use Woenel\Prpcmblmts\Models\PhilippineProvince;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Address extends Model
{
    protected $fillable = [
        'region_id',
        'province_id',
        'city_id',
        'barangay_id',
        'street',
        'address_type',
        'full_address',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function orders() : MorphToMany
    {
        return $this->morphedByMany(Order::class, 'addressable');
    }

    public function philippineRegion() : BelongsTo
    {
        return $this->belongsTo(PhilippineRegion::class, 'region_id');
    }

    public function philippineProvince() : BelongsTo
    {
        return $this->belongsTo(PhilippineProvince::class, 'province_id');
    }

    public function philippineCity() : BelongsTo
    {
        return $this->belongsTo(PhilippineCity::class, 'city_id');
    }

    public function philippineBarangay() : BelongsTo
    {
        return $this->belongsTo(PhilippineBarangay::class, 'barangay_id');
    }
}
