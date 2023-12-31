<?php

namespace App\Http\Controllers;

use Flyff\Modules\Settings\Http\Requests\UpdateSettingRequest;
use Flyff\Modules\Settings\Models\Setting;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function __construct(
        private readonly SettingService $settingService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard/Setting/Index', [
            'themes' => $this->settingService->getThemes(),
            'setting' => $this->settingService->getSetting()
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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $updateSettingRequest): \Illuminate\Http\RedirectResponse
    {
        $this->settingService->updateSetting($updateSettingRequest->validated());
        return redirect()->back()->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
