<?php

namespace App\Http\Controllers;

use Flyff\Modules\Item\Models\Item;
use Flyff\Modules\Item\Services\ItemService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{

    public function __construct(
        private readonly ItemService $itemService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = [];
        if (request()->has('query') && request('query') !== '' && !empty(request('query')) ) {
            $items = $this->itemService->searchItem(request('query'));
        } else {
            $items = $this->itemService->getAllItemsWithPaginate(30);
        }

        return Inertia::render('Dashboard/Item/Index', [
            'items' => $items
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
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
