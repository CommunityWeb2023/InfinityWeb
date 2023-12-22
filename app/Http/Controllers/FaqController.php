<?php

namespace App\Http\Controllers;

use Flyff\Modules\FAQ\Models\Faq;
use Flyff\Modules\FAQ\Services\FaqService;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FaqController extends Controller
{
    public function __construct(
        private readonly FaqService $faqService,
        private readonly SettingService $settingService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->settingService->currentTheme() . '/FAQ/Index');
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
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
