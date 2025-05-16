<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\ProductCategory;
use Livewire\Attributes\Layout;

class ProductCategorieArchive extends Component
{
    public $getProductCategories;

    public function mount($prod_cat_slug)
    {
        $this->getProductCategories = ProductCategory::with([
        'products' => function ($query) {
            $query->where('is_visible', true)
                ->with([
                    'productImages',
                    'brand:id,brand_name',
                    'discounts' => function ($discountQuery) {
                        $discountQuery->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                            ->where('starts_at', '<=', now())
                            ->where('ends_at', '>=', now());
                    }
                ]);
        }
    ])
    ->where('prod_cat_slug', $prod_cat_slug)
    ->where('is_visible', true)
    ->first();
    }

    #[Layout('layouts.app')]
    #[Title('Shop')]
    public function render()
    {
        return view('livewire.pages.product-categorie-archive',[
            'productCategories' => $this->getProductCategories
        ]);
    }
}
