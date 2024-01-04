<?php

namespace App\Http\Controllers;

use Flyff\Modules\Settings\Services\SettingService;
use Flyff\Modules\Team\Models\Team;
use Flyff\Modules\Team\Services\TeamService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService,
        private readonly SettingService $settingService,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render($this->settingService->currentTheme() . '/Team/Index');
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
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
