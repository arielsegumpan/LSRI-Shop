<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
        'prod_dimensions' => 'array',
    ];

    // Relationships
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function productCategories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_product', 'product_id', 'product_category_id')->withTimestamps();
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_product', 'product_id', 'discount_id')
                    ->withPivot(['discount_type', 'discount_code', 'discount_value'])
                    ->withTimestamps();
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'product_id', 'id');
    }

    // Scopes
    public function scopeVisible(Builder $query): void
    {
        $query->where('is_visible', true);
    }

    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }

    public function scopeWithShopRelations(Builder $query): void
    {
        $query->with([
            'brand:id,brand_name',
            'productCategories:id,prod_cat_name,prod_cat_slug',
            'discounts' => function ($query) {
                $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                    ->whereRaw('? BETWEEN `starts_at` AND `ends_at`', [now()]);
            }
        ]);
    }

    public function scopeNewest(Builder $query): void
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeForShop(Builder $query): void
    {
        $query->visible()
              ->withShopRelations()
              ->newest();
    }

    public function scopeWithSingleProductRelations(Builder $query): void
    {
        $query->with([
            'productImages',
            'brand:id,brand_name',
            'productCategories' => function($query) {
                $query->where('is_visible', 1);
            },
            'discounts' => function ($query) {
                $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                      ->whereRaw('? BETWEEN `starts_at` AND `ends_at`', [now()]);
            }
        ]);
    }

    public function scopeWithBasicRelations(Builder $query): void
    {
        $query->with([
            'productImages',
            'brand:id,brand_name',
            'discounts' => function ($query) {
                $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                      ->withPivot(['discount_type', 'discount_value'])
                      ->whereRaw('? BETWEEN `starts_at` AND `ends_at`', [now()]);
            }
        ]);
    }

    public function scopeBySlug(Builder $query, string $slug): void
    {
        $query->where('prod_slug', $slug);
    }

    public function scopeRelatedByCategories(Builder $query, array $categoryIds, int $excludeProductId): void
    {
        $query->whereHas('productCategories', function ($q) use ($categoryIds) {
                $q->whereIn('product_categories.id', $categoryIds);
              })
              ->where('id', '!=', $excludeProductId)
              ->visible();
    }

    // Accessors
    public function getActiveDiscountAttribute()
    {
        return $this->discounts->first(function ($discount) {
            $now = now();
            return $now->between($discount->starts_at, $discount->ends_at);
        });
    }

    public function getDiscountedPriceAttribute()
    {
        $activeDiscount = $this->active_discount;

        if (!$activeDiscount) {
            return $this->prod_price;
        }

        $type = $activeDiscount->pivot->discount_type;
        $value = $activeDiscount->pivot->discount_value;

        if ($type === 'percentage') {
            return round($this->prod_price - ($this->prod_price * ($value / 100)), 2);
        }

        if ($type === 'fixed') {
            return max(round($this->prod_price - $value, 2), 0);
        }

        return $this->prod_price;
    }

    public function getDiscountBadgeTextAttribute()
    {
        $activeDiscount = $this->active_discount;

        if (!$activeDiscount) {
            return null;
        }

        $discount = $activeDiscount->pivot;

        return $discount->discount_type === 'percentage'
            ? number_format($discount->discount_value, 0) . '% OFF'
            : '₱' . number_format($discount->discount_value, 0) . ' OFF';
    }

    public function getHasDiscountAttribute()
    {
        $activeDiscount = $this->active_discount;
        return $activeDiscount && $this->discounted_price < $this->prod_price;
    }
}
