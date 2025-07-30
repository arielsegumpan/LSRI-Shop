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

    #[Layout('layouts.app')]
    #[Title('Shop')]
    public function render()
    {
        return view('livewire.pages.shop-page', [
            'products' => Product::forShop()->paginate(12),
        ]);
    }
}
