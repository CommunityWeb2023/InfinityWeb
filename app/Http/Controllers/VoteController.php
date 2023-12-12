<?php

namespace App\Http\Controllers;

use Flyff\Modules\Vote\Http\Requests\PingBackVoteRequest;
use Flyff\Modules\Vote\Models\Vote;
use Flyff\Modules\Vote\Services\VoteService;
use Flyff\Modules\Vote\Services\VoteSettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function __construct(
        private readonly VoteSettingService $voteSettingService,
        private readonly VoteService $voteService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Vote/Index', [
            'voteSites' => $this->voteSettingService->getVoteSites(),
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
    public function store(PingBackVoteRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->voteService->storeVote($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
