<?php

namespace App\Http\Controllers;

use Flyff\Modules\Ranking\Services\UserRankingService;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RankingController extends Controller
{
    public function __construct(
        private readonly UserRankingService $userRankingService,
        private readonly SettingService $settingService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function indexUser(): \Inertia\Response
    {
        $pageSize = 50;
        if(request()->has('pageSize')){
            if (request()->get('pageSize') > 250){
                $pageSize = 250;
            } else if (request()->get('pageSize') < 10){
                $pageSize = 10;
            } else{
                $pageSize = request()->get('pageSize');
            }
        }
        return Inertia::render($this->settingService->currentTheme() . '/Ranking/User/Index', [
            'characters' => $this->userRankingService->getCharacters($pageSize),
            'currentPageSize' => $pageSize,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
