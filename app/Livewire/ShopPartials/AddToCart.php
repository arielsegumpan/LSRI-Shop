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
    public $maxQuantity;

    #[Locked]
    public $id;

    public function mount($product)
    {
        $this->product = $product;
        $this->maxQuantity = $product->prod_qty;
    }

    public function incQuantity()
    {
        if ($this->quantity < $this->maxQuantity) {
            $this->quantity += 1;
        }
    }

    public function decQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }


    public function addToCart()
    {
        if($this->quantity > $this->maxQuantity){
            $this->notify(
                'Exceed in the maximum quantity! Product max quantity is '.$this->maxQuantity,
                'error',
                3000
            );
            return $this->quantity = 1;
        }
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
