<?php

namespace App\Traits;

use App\Models\CartItem;
use App\Models\Adoption\Adoption;
use App\Models\Adoption\AdoptionCart;

trait ProductCartItemTrait
{
    public function getCartItemInfo($userId, $productId)
    {
        return CartItem::getCartItem($userId, $productId)->first();
    }
}
