<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Livewire\Traits\HasRemoveItem;
use App\Livewire\Traits\HasAlertNotification;

class Checkout extends Component
{
    use HasAlertNotification, HasRemoveItem;

    public array $cart = [];
    public float $total = 0;

    public $customer_amount = 100;
    public $customer_payment_method = '';

     // New card-related properties
    public $card_name = '';
    public $card_number = '';
    public $expiration_month = '';
    public $expiration_year = '';
    public $cvv = '';

    public $paymentIntent = null;
    public $paymentIntent_id;
    public $paymentMethod;
    public $createPaymentIntent;

    #[On('checkout-updated')]
    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
      return $this->total = collect($this->cart)->reduce(fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
    }

    public function updateQuantity($productId, $quantity)
    {
        if ($quantity < 1) {
            $this->notify('Minimum quantity is 1', 'error', 3000);
            return;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = (int) $quantity;
            session()->put('cart', $cart);
        }

        $this->cart = $cart;

        $this->dispatch('cart-updated');

        $this->calculateTotal();
    }

    public function removeItem($id)
    {
       return $this->removeCartItem($id);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.checkout');
    }
}
