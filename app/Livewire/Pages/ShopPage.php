<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ShopPage extends Component
{
    use WithPagination;

    public $products;
    protected function getShopProduct() {

      return $this->products = Product::with([
            'brand:id,brand_name',
            'productCategories:id,prod_cat_name,prod_cat_slug',
            'discounts' => function ($query) {
                $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
                      ->where('starts_at', '<=', now())
                      ->where('ends_at', '>=', now());
            }
        ])
        ->where('is_visible', true)
        ->whereDate('created_at', '>=', Carbon::today()->subMonths(1))
        ->orderBy('created_at', 'desc')
        ->get();

    }


    #[Layout('layouts.app')]
    #[Title('Shop')]
    public function render()
    {
        $this->getShopProduct();
        return view('livewire.pages.shop-page', [
            'products' => $this->products
        ]);
    }
}
