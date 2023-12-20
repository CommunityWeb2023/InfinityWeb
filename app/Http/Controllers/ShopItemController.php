<?php

namespace App\Http\Controllers;

use Flyff\Modules\Item\Models\Item;
use Flyff\Modules\Shop\Http\Requests\ShopItemCreateRequest;
use Flyff\Modules\Shop\Models\ShopItem;
use Flyff\Modules\Shop\Services\ShopCategoryService;
use Flyff\Modules\Shop\Services\ShopItemService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopItemController extends Controller
{

    public function __construct(
        private readonly ShopItemService $shopItemService,
        private readonly ShopCategoryService $shopCategoryService
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
    public function create(Item $item)
    {
        return Inertia::render('Dashboard/Shop/AddItem', [
            'item' => $item,
            'categories' => $this->shopCategoryService->getAllActiveCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopItemCreateRequest $itemCreateRequest)
    {
        $this->shopItemService->create($itemCreateRequest->validated());
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShopItem $shopItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShopItem $shopItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShopItem $shopItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopItem $shopItem)
    {
        //
    }
}
