<?php

namespace Flyff\Modules\Shop\Services;

use Flyff\Modules\Shop\Models\Cart;
use Flyff\Modules\Shop\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function __construct(
        private readonly CartRepository $cartRepository
    ){}

    public function getCart()
    {
        return $this->cartRepository->getCart();
    }

    public function addOrUpdate(int $shop_item_id, int $quantity): void
    {
        $cart = $this->cartRepository->getCart()->where('shop_item_id', $shop_item_id)->first();
        if ($cart) {
            $cart->quantity += 1;
            $this->cartRepository->save($cart);
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->shop_item_id = $shop_item_id;
            $cart->quantity = $quantity;
            $this->cartRepository->save($cart);
        }
    }

    public function delete($cart): void
    {
        if ($cart) {
            $this->cartRepository->delete($cart);
        }
    }
}