<?php

namespace App\Http\Controllers;

use Flyff\Modules\Guides\Models\Guides;
use Flyff\Modules\Guides\Services\GuidesService;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuidesController extends Controller
{
    public function __construct(
        private readonly GuidesService $guidesService,
        private readonly SettingService $settingService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->settingService->currentTheme() . '/Guides/Index');
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
    public function show(Guides $guides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guides $guides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guides $guides)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guides $guides)
    {
        //
    }
}
