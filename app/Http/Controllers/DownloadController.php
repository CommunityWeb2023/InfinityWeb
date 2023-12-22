<?php

namespace App\Http\Controllers;

use Flyff\Modules\Download\Models\Download;
use Flyff\Modules\Download\Services\DownloadService;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DownloadController extends Controller
{
    public function __construct(
        private readonly DownloadService $downloadService,
        private readonly SettingService $settingService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->settingService->currentTheme() . '/Download/Index');
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
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        //
    }
}
