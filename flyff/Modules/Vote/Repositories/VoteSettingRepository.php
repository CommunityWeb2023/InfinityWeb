<?php

namespace Flyff\Modules\Vote\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Vote\Models\VoteSetting;

class VoteSettingRepository extends BaseRepository
{


    public function getVotePointsByPage($site): int
    {
        return VoteSetting::where('site', $site)->first()->votepoints;
    }

    public function getVoteSites(): \Illuminate\Database\Eloquent\Collection
    {
        return VoteSetting::all();
    }

    public function findById($id): VoteSetting
    {
        return VoteSetting::find($id);
    }
}