<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeGetCartItem($query, $userId, $productId) {
        return $query->where('user_id', $userId)->where('product_id', $productId);
    }
}
