<?php

namespace Flyff\Modules\User\Services;

use App\Models\User;
use Flyff\Modules\User\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){}

    public function getUserByUsername(string $username)
    {
        return $this->userRepository->getUserByUsername($username);
    }

    public function update(User $user): void
    {
        $this->userRepository->saveUser($user);
    }

    public function increaseVotePoints(User $user, int $amount): void
    {
        $user->votepoints += $amount;
        $this->userRepository->saveUser($user);
    }

    public function getLastUsersToday()
    {
        return $this->userRepository->getLastUsersToday();
    }

    public function getLastUserYesterday()
    {
        return $this->userRepository->getLastUserYesterday();
    }

    // function to get the average between today and yesterday in percent (e.g. 50%)
    public function getAvgBetweenUsersTodayAndYesterday()
    {
        $today = $this->getLastUsersToday();
        $yesterday = $this->getLastUserYesterday();
        $todayCount = count($today);
        $yesterdayCount = count($yesterday);
        if ($todayCount == 0 || $yesterdayCount == 0){
            return 0;
        }
        $avg = ($todayCount / $yesterdayCount) * 100;
        return round($avg, 2);
    }
}