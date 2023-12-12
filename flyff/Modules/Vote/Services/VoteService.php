<?php

namespace Flyff\Modules\Vote\Services;

use App\Enums\VoteStateEnums;
use Flyff\Modules\User\Services\UserService;
use Flyff\Modules\Vote\Models\Vote;
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


    public function storeVote(array $data): \Illuminate\Http\JsonResponse
    {
        $parameter = explode(',' , $data['pingUsername']);

        Log::info('Vote: ' . $data['pingUsername'] . ' ' . $data['Successful'] . ' ' . $data['VoterIP'] . ' ' . $data['Reason'] . ' ' . $parameter[0] . ' ' . $parameter[1]);

        $voteSite = $this->voteSettingService->findById(intval($parameter[1]));
        $user = $this->userService->getUserByUsername($parameter[0]);

        if($voteSite->site === 'GTOP100'){
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

        Log::info('Vote: ' . $data['pingUsername'] . ' ' . $data['Successful'] . ' ' . $data['VoterIP'] . ' ' . $data['Reason']);

        return response()->json([
            'status' => 'success',
            'message' => 'Vote successfully saved'
        ], 200);
    }
}