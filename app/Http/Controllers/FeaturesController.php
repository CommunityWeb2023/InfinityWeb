<?php

namespace App\Http\Controllers;

use Flyff\Modules\Features\Models\Features;
use Flyff\Modules\Features\Services\FeaturesService;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeaturesController extends Controller
{
    public function __construct(
        private readonly FeaturesService $featuresService,
        private readonly SettingService $settingService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->settingService->currentTheme() . '/Features/Index');
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
    public function show(Features $features)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Features $features)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Features $features)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Features $features)
    {
        //
    }
}
