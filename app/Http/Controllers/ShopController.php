<?php

namespace App\Http\Controllers;

use Flyff\Modules\Shop\Models\Shop;
use Flyff\Modules\Shop\Services\CartService;
use Flyff\Modules\Shop\Services\ShopCategoryService;
use Flyff\Modules\Shop\Services\ShopItemService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{

    public string $theme = 'Classic';

    public function __construct(
        private readonly ShopCategoryService $shopCategoryService,
        private readonly ShopItemService $shopItemService,
        private readonly CartService $cartService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->theme . '/Shop/Index',[
            'categories' => $this->shopCategoryService->getAllActiveCategories(),
            'items' => $this->shopItemService->getAllActiveItemsWithPaginate(20),
            'cartItems' => $this->cartService->getCart()
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
