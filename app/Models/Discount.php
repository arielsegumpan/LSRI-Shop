<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    protected $fillable = [
        'discount_name',
        'discount_slug',
        'discount_desc',
        'discount_banner',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'discount_product',
            'discount_id',
            'product_id'
            )->withPivot('discount_type', 'discount_code', 'discount_value')
            ->withTimestamps();
    }
}
