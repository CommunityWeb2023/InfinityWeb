<?php

namespace App\Http\Controllers;

use Flyff\Modules\Shop\Http\Requests\AddItemToCart;
use Flyff\Modules\Shop\Models\Cart;
use Flyff\Modules\Shop\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private readonly CartService $cartService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddItemToCart $addItemToCart): void
    {
        $this->cartService->addOrUpdate($addItemToCart->get('shop_item_id'), $addItemToCart->get('quantity'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $this->cartService->delete($cart);
    }
}
