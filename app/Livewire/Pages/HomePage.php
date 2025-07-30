<?php

namespace App\Livewire\Pages;

// use Carbon\Carbon;
use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;

class HomePage extends Component
{

    public $getFtProds;
    public $newProducts;
    public $getBrands;

    public function mount(){

         $this->getFtProds = Product::with('productImages', 'brand', 'productCategories')
        ->where('is_visible', true)
        ->where('is_featured', true)
        ->get()
        ->toArray();

        $this->newProducts = Product::with([
            'brand:id,brand_name',
            'discounts' => function ($query) {
                $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at');
            }
            // 'discounts' => function ($query) {
            //      $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at');
            //     // $query->select('discounts.id', 'discount_name', 'starts_at', 'ends_at')
            //         //   $query->where('starts_at', '<=', now())
            //         //   ->where('ends_at', '>=', now());
            // }
        ])
        ->where('is_visible', true)
        ->whereDate('created_at', '>=', Carbon::today()->subMonths(1))
        ->orderBy('created_at', 'desc')
        ->get([
            'id',
            'prod_sku',
            'prod_qty',
            'prod_name',
            'prod_slug',
            'brand_id',
            'prod_price',
            'prod_ft_image',
            'created_at'
        ]);

        $this->getBrands = Product::with('brand')
        ->where('is_visible', true)
        ->take(10)
        ->get()
        ->toArray();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        // dd($this->newProducts);
        return view('livewire.pages.home-page',[
            'getFtProds' => $this->getFtProds,
            'newProducts' => $this->newProducts,
            'getBrands' => $this->getBrands
        ]);
    }
}
