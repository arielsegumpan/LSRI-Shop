<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'brand_id',
        'prod_name',
        'prod_slug',
        'prod_sku',
        'prod_barcode',
        'prod_ft_image',
        'prod_short_desc',
        'prod_long_desc',
        'prod_qty',
        'prod_security_stock',
        'is_featured',
        'is_visible',
        'prod_price',
        'prod_cost',
        'prod_color',
        'prod_type',
        'prod_requires_shipping',
        'prod_published_at',
        'prod_seo_title',
        'prod_seo_description',
        'prod_dimensions'
    ];


    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'is_visible' => 'boolean',
        'prod_requires_shipping' => 'boolean',
        'prod_published_at' => 'datetime',
        'prod_dimensions' => 'array', // Cast JSON to array
    ];

    public function brand() : BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function productCategories() : BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_product', 'product_id', 'product_category_id')->withTimestamps();
    }
    public function productImages() : HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function discounts() : BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_product', 'product_id', 'discount_id')
                    ->withPivot('discount_type', 'discount_code', 'discount_value')
                    ->withTimestamps();
    }

    public function currentSale()
    {
        return $this->sales()
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now())
            ->orderBy('starts_at', 'desc')
            ->first();
    }
}
