<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'street',
        'city',
        'state',
        'zip',
        'address_type',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
