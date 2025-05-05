<?php

namespace App\Livewire\Pages;

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
        $this->getFtProds = Product::with('productImages', 'brand', 'productCategories')->where('is_visible', true)->where('is_featured', true)->get()->toArray();
        $this->newProducts = Product::with('productImages', 'brand', 'productCategories')
        ->where('is_visible', true)
        ->whereDate('created_at', '>=', Carbon::today()->subDays(4))
        ->orderBy('created_at', 'desc')
        ->get()->toArray();
        $this->getBrands = Product::with('brand')->where('is_visible', true)->take(10)->get()->toArray();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.home-page',[
            'getFtProds' => $this->getFtProds,
            'newProducts' => $this->newProducts,
            'getBrands' => $this->getBrands
        ]);
    }
}
