<?php

namespace App\Livewire\ShopPartials;

use Livewire\Component;
use Livewire\Attributes\On;

class CartCount extends Component
{
    public $count = 0;

    #[On('cart-updated')]
    public function mount()
    {
        $cart = session()->get('cart', []);

        $this->count = count($cart);

    }

    public function render()
    {
        return view('livewire.shop-partials.cart-count');
    }
}
