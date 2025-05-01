<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'brand_image',
        'brand_website',
        'is_visible',
        'brand_desc',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
