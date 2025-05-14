<?php

namespace App\Livewire\ShopPartials;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Traits\HasRemoveItem;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CartItems extends Component
{
    use HasRemoveItem;

    public $cart = [];

    protected $listeners = ['cart-updated' => 'refreshCart'];
    protected $rules = [
        'cart.*.quantity' => 'required|integer|min:1',
    ];

    #[On('cart-updated')]
    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function refreshCart()
    {
        $this->cart = session()->get('cart', []);
    }


    public function updateCart()
    {
        $this->validate();

        session()->put('cart', $this->cart);

        $this->dispatch('cart-updated');
        $this->dispatch('checkout-updated');
    }

    public function removeItem($id)
    {
        return $this->removeCartItem($id);
    }


    public function render()
    {
        return view('livewire.shop-partials.cart-items');
    }
}
