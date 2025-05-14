<?php

namespace App\Livewire\Traits;

trait HasRemoveItem
{
    public function removeCartItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $this->cart = $cart;

        $this->dispatch('cart-updated');
        $this->dispatch('checkout-updated');
    }
}
