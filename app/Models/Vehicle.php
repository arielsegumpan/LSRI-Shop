<?php

namespace App\Models;

use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{

    protected $fillable = [
        'user_id',
        'type',
        'brand',
        'model',
        'description',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceRequests() : HasMany
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
