<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sale_banner',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];


    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_sale', 'sale_id', 'product_id')->withPivot('sale_price')->withTimestamps();
    }


}
