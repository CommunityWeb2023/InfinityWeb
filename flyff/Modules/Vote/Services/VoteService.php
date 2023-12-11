<?php

namespace Flyff\Modules\Vote\Services;

use App\Enums\VoteStateEnums;
use Flyff\Modules\User\Services\UserService;
use Flyff\Modules\Vote\Models\Vote;
use Flyff\Modules\Vote\Repositories\VoteRepository;
use \Flyff\Modules\Vote\Repositories\VoteSettingRepository;


class VoteService
{
    public function __construct(
        private readonly VoteSettingService $voteSettingService,
        private readonly VoteRepository $voteRepository,
        private readonly UserService $userService
    ){}


    public function storeVote(array $data)
    {
        $parameter = explode(',' , $data['pingUsername']);
        $voteSite = $this->voteSettingService->findById($parameter[1]);
        $user = $this->userService->getUserByUsername($parameter[0]);

        if($voteSite === 'GTOP100'){
            if(!empty($voteSite->ping_back_key)){
                if(!isset($data['pingbackkey'])){
                    return response()->json([
                        'status' => 'error',
                        'message' => 'PingBackKey is not valid'
                    ], 500);
                }
                if($data['pingbackkey'] !== $voteSite->ping_back_key){
                    return response()->json([
                        'status' => 'error',
                        'message' => 'PingBackKey is not valid'
                    ], 500);
                }
            }

            $vote = new Vote();
            $vote->site = $parameter[1];
            $vote->success = $data['Successful'];
            $vote->user_id = $user->id;
            $vote->ip = $data['VoterIP'];
            $vote->description = $data['Reason'];
            $this->voteRepository->save($vote);

            if($data['Successful'] === VoteStateEnums::SUCCESS)
            {
                $user->vote_points += $voteSite->votepoints;
                $this->userService->update($user);
            }
        }


    }
}