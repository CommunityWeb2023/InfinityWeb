<?php

namespace Flyff\Modules\Vote\Services;

use Flyff\Modules\Vote\Repositories\VoteSettingRepository;

class VoteSettingService
{
    public function __construct(
        private readonly VoteSettingRepository $voteSettingRepository
    ){}


    public function findById(int $id): \Flyff\Modules\Vote\Models\VoteSetting
    {
        return $this->voteSettingRepository->findById($id);
    }

    public function getVoteSites(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->voteSettingRepository->getVoteSites();
    }


}