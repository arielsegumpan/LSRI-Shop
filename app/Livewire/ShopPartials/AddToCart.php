<?php

namespace App\Livewire\ShopPartials;

use Livewire\Component;
use Livewire\Attributes\Locked;
use App\Livewire\Traits\HasAlertNotification;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class AddToCart extends Component
{
    use HasAlertNotification;

    public $product;
    public $quantity = 1;

    #[Locked]
    public $id;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);

        $this->id = $this->product->id;

        if (isset($cart[$this->id])) {
            $cart[$this->id]['quantity'] += $this->quantity;
        } else {
            $cart[$this->id] = [
                'id' => $this->id,
                'image' => $this->product->prod_ft_image,
                'name' => $this->product->prod_name,
                'price' => $this->product->prod_price,
                'quantity' => $this->quantity,
            ];
        }

        session()->put('cart', $cart);

        $this->dispatch('cart-updated');
        $this->notify(
                'Product added successfully!',
                'success',
                3000
            );
    }

    public function render()
    {
        return view('livewire.shop-partials.add-to-cart');
    }
}
