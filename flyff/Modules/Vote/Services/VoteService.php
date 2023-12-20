<?php

namespace Flyff\Modules\Vote\Services;

use App\Enums\VoteStateEnums;
use App\Models\User;
use Flyff\Modules\User\Services\UserService;
use Flyff\Modules\Vote\Models\Vote;
use Flyff\Modules\Vote\Models\VoteSetting;
use Flyff\Modules\Vote\Repositories\VoteRepository;
use \Flyff\Modules\Vote\Repositories\VoteSettingRepository;
use Illuminate\Support\Facades\Log;


class VoteService
{
    public function __construct(
        private readonly VoteSettingService $voteSettingService,
        private readonly VoteRepository $voteRepository,
        private readonly UserService $userService
    ){}


    public function checkVote(array $data): \Illuminate\Http\JsonResponse
    {
        $parameter = explode(',' , $data['pingUsername']);

        if(count($parameter) !== 2){
            return response()->json([
                'status' => 'error',
                'message' => 'PingUsername is not valid'
            ], 500);
        }

        $voteSite = $this->voteSettingService->findById(intval($parameter[1]));
        $user = $this->userService->getUserByUsername($parameter[0]);

        if($voteSite->site === 'GTOP100'){
            $this->gtop100Vote(user: $user, voteSetting: $voteSite, data: $data);

        }

        return response()->json([
            'status' => 'success',
            'message' => 'Vote successfully saved'
        ], 200);
    }

    public function gtop100Vote(User $user, VoteSetting $voteSetting, array $data)
    {
        if(!empty($voteSetting->ping_back_key)){
            if(!isset($data['pingbackkey'])){
                return response()->json([
                    'status' => 'error',
                    'message' => 'PingBackKey is not valid'
                ], 500);
            }
            if($data['pingbackkey'] !== $voteSetting->ping_back_key){
                return response()->json([
                    'status' => 'error',
                    'message' => 'PingBackKey is not valid'
                ], 500);
            }
        }

        $vote = new Vote();
        $vote->site = $voteSetting->site;
        $vote->success = $data['Successful'];
        $vote->user_id = $user->id;
        $vote->ip = $data['VoterIP'];
        $vote->description = $data['Reason'];
        $this->voteRepository->save($vote);

        if((int)$data['Successful'] === VoteStateEnums::SUCCESS->value)
        {
            $this->userService->increaseVotePoints($user, $voteSetting->votepoints);
        }
    }
}