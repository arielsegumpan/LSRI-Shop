<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ShopPageSingle extends Component
{
    public Product $product;
    public $related_products;

    public function mount($prod_slug)
    {
        $this->product = Product::withSingleProductRelations()
            ->bySlug($prod_slug)
            ->visible()
            ->firstOrFail();

        $this->getRelatedProducts();
    }

    private function getRelatedProducts()
    {
        $categoryIds = $this->product->productCategories->pluck('id')->toArray();

        if (empty($categoryIds)) {
            // If no categories, get random visible products
            $this->related_products = Product::withBasicRelations()
                ->visible()
                ->where('id', '!=', $this->product->id)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        } else {
            $this->related_products = Product::withBasicRelations()
                ->relatedByCategories($categoryIds, $this->product->id)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        }
    }

    #[Layout('layouts.app')]
    #[Title('Shop')]
    public function render()
    {
        return view('livewire.pages.shop-page-single', [
            'product' => $this->product,
            'related_products' => $this->related_products
        ]);
    }
}
