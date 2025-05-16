<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Product;
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
    public float $sub_total = 0;
    public float $tax = 0;


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
        $this->calculateSubTotal();
        $this->calcaulateTax();
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = $this->sub_total + $this->tax;
        // return $this->total;
    }

    // public function calculateSubTotal()
    // {
    //     $this->sub_total = 0;

    //     foreach ($this->cart as $productId => $item) {
    //         $product = Product::with(['discounts'])->find($productId);
    //         if (!$product) continue;

    //         $quantity = $item['quantity'];
    //         $originalPrice = $product->prod_price;
    //         $discountedPrice = $this->getDiscountedPrice($product);

    //         $this->cart[$productId]['price'] = $discountedPrice;

    //         $this->sub_total += $discountedPrice * $quantity;
    //     }

    //     return $this->sub_total;
    // }

    public function calculateSubTotal()
    {
        $this->sub_total = 0;

        foreach ($this->cart as $productId => $item) {
            $product = Product::with('discounts')->find($productId);
            if (!$product) continue;

            $quantity = $item['quantity'];
            $originalPrice = $product->prod_price;
            $discountedPrice = $this->getDiscountedPrice($product);

            // Update cart display fields
            $this->cart[$productId]['original_price'] = $originalPrice;
            $this->cart[$productId]['price'] = $discountedPrice;
            $this->cart[$productId]['has_discount'] = $originalPrice != $discountedPrice;
            $this->cart[$productId]['discount_label'] = $product->discounts->first()?->discount_name;
            // $this->cart[$productId]['discount_val'] = $product->discounts->discount_value;

            $this->sub_total += $discountedPrice * $quantity;
        }

        return $this->sub_total;
    }


    public function calcaulateTax()
    {
        $this->tax = 0;

        foreach ($this->cart as $productId => $item) {
            $quantity = $item['quantity'];
            $price = $item['price']; // Already updated in calculateSubTotal
            $this->tax += ($price * $quantity) * 0.12;
        }

        return $this->tax;
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
        $this->dispatch('checkout-updated');

        $this->calculateTotal();
        $this->calcaulateTax();
        $this->calculateSubTotal();
    }

    public function removeItem($id)
    {
       return $this->removeCartItem($id);
    }

    public function incCustAmount()
    {
        $this->customer_amount += 100;

    }

    public function decCustAmount()
    {
        if ($this->customer_amount > 100) {
            $this->customer_amount -= 100;
        }
    }


    public function checkAmount()
    {
        if ($this->customer_amount < $this->total) {
            $this->dispatch('checkout-updated');
           return $this->notify('Insufficient amount', 'error', 3000);
        }


    }


    private function getDiscountedPrice($product)
    {
        $now = Carbon::now();

        $activeDiscount = $product->discounts->first(function ($discount) use ($now) {
            return $now->between($discount->starts_at, $discount->ends_at);
        });

        $originalPrice = $product->prod_price;

        if (!$activeDiscount) {
            return $originalPrice;
        }

        $type = $activeDiscount->pivot->discount_type;
        $value = $activeDiscount->pivot->discount_value;

        if ($type === 'percentage') {
            return max(0, $originalPrice - ($originalPrice * $value / 100));
        }

        if ($type === 'fixed') {
            return max(0, $originalPrice - $value);
        }

        return $originalPrice;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.checkout');
    }
}
