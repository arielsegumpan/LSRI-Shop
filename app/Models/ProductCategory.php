<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductCategory extends Model
{
    protected $fillable = [
        'prod_cat_name',
        'prod_cat_slug',
        'prod_cat_desc',
        'prod_cat_image',
        'is_visible',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category_product', 'product_category_id', 'product_id')->withTimestamps();
    }

    // Scopes
    public function scopeVisible(Builder $query): void
    {
        $query->where('is_visible', true);
    }

    public function scopeBySlug(Builder $query, string $slug): void
    {
        $query->where('prod_cat_slug', $slug);
    }

    public function scopeWithVisibleProducts(Builder $query): void
    {
        $query->with([
            'products' => function ($query) {
                $query->where('is_visible', true)
                    ->with([
                        'productImages',
                        'brand:id,brand_name',
                        'discounts' => function ($discountQuery) {
                            $discountQuery->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                                ->withPivot(['discount_type', 'discount_value'])
                                ->whereRaw('? BETWEEN `starts_at` AND `ends_at`', [now()]);
                        }
                    ])
                    ->orderBy('created_at', 'desc');
            }
        ]);
    }

    public function scopeForArchive(Builder $query, string $slug): void
    {
        $query->visible()
              ->bySlug($slug)
              ->withVisibleProducts();
    }
}
