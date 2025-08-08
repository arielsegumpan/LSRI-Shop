<?php

namespace App\Livewire\Items;

use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CartItems extends Component
{

    public $cart = [];
    public $cartCount = 0;


    public function mount(){
        $this->cart = Session::get('cart', []);
        $this->updateCartCount();
    }


    public function addToCart($productId, $quantity = 1)
    {
        $product = Product::findOrFail($productId);

        if(isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += $quantity;
        }else{
            $this->cart[$productId] = [
                'product_id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->prod_ft_image ?? null,
            ];
        }

        Session::put('cart', $this->cart);
        $this->updateCartCount();
        $this->dispatch('cart-updated'); // Emit the event
        $this->dispatch('cart-updated', $this->cartCount);
        $this->notify(
            'Product added!',
            'Product added successfully.',
            'success',
            3000
        );
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            Session::put('cart', $this->cart);
            $this->updateCartCount();
            $this->dispatch('cart-updated');
            $this->dispatch('cart-updated', $this->cartCount);
            $this->notify(
                'Product removed from cart!',
                'Product removed successfully.',
                'success',
                3000
            );
        }
    }

    public function updateQuantity($productId, $newQuantity)
    {
        if ($newQuantity <= 0) {
            $this->removeFromCart($productId);
            return;
        }
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] = $newQuantity;
            Session::put('cart', $this->cart);
            $this->updateCartCount();
            $this->dispatch('cart-updated');
            $this->dispatch('cart-updated', $this->cartCount);
            $this->notify(
                'Cart updated!',
                'Quantity updated successfully.',
                'success',
                3000
            );
        }
    }

    public function updateCart()
    {
        $this->cart = Session::get('cart', []);
        $this->updateCartCount();
    }

    private function updateCartCount()
    {
        $this->cartCount = count($this->cart);
    }

    public function checkout()
    {
         if (empty($this->cart)) {
            $this->notify(
                'Your cart is empty!',
                'Please add items to your cart before checking out.',
                'error',
                3000
            );
            return;
        }

        if (!Auth::check()) {
            // Store cart data in session to retrieve after login/registration
            Session::put('checkout_cart', $this->cart);
            // Redirect to register
            return redirect()->route('filament.auth.auth.register');
        }

        // If the user is logged in, process the checkout
        $this->processCheckout(Auth::user());
    }

    protected function processCheckout($user)
    {
        try {
            DB::transaction(function () use ($user) {
                foreach ($this->cart as $item) {
                    $cartItem = CartItem::firstOrNew(
                        ['user_id' => $user->id, 'product_id' => $item['product_id']]
                    );

                    $cartItem->quantity = $item['quantity'];
                    $cartItem->price = $item['price']; // Or fetch from product again for accuracy
                    $cartItem->save();
                }

                // Clear the cart after successful checkout
                $this->cart = [];
                Session::forget('cart');
                Session::forget('checkout_cart'); //important to remove
                $this->notify(
                    'Checkout successful!',
                    'Your order has been placed successfully.',
                    'success',
                    3000
                );
                // Optionally, redirect to an order confirmation page
                redirect()->route('page.home'); // Change 'order.confirmation' as needed
            });
        } catch (\Exception $e) {
            // Handle the error (e.g., show a message to the user)
            $this->notify(
                'Checkout failed!',
                'An error occurred during checkout.',
                'error',
                3000
            );
            // Log the error for debugging
            Log::error('Checkout error: ' . $e->getMessage());
        }
    }

    /**
     *
     * @param string $title The title sang sweet alert notfication
     * @param string $message The message content sang sweet alert
     * @param string $icon The alert type ('success', 'error', 'warning', 'info', etc.)
     * @param int $timer Duration in milliseconds ni sa
     * @return mixed
     */
    public function notify($title, $message, $icon, $timer)
    {
        $alert = LivewireAlert::title($title)
            ->text($message)
            ->timer($timer)
            ->toast()
            ->position('top-end');

        // Dynamically set the alert type based on the $icon parameter
        switch ($icon) {
            case 'success':
                $alert->success();
                break;
            case 'error':
                $alert->error();
                break;
            case 'warning':
                $alert->warning();
                break;
            case 'info':
                $alert->info();
                break;
            default:
                // Default to success if icon type is not recognized
                $alert->success();
                break;
        }

        return $alert->show();
    }

    public function render()
    {
        return view('livewire.items.cart-items');
    }
}
