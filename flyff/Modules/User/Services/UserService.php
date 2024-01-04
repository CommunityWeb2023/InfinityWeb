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

    public function getUserById(int $id)
    {
        return $this->userRepository->getUserById($id);
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

    public function getAllUsers(){
        $users = $this->userRepository->getAllUsers();

        // order and group users by their first letter
        $users = $users->sortBy('username')->groupBy(function ($item, $key) {
            return substr($item->username, 0, 1);
        });

        // add accounts key
        $users = $users->map(function ($item, $key) {
            return [
                'accounts' => $item,
            ];
        });

        // add lost letters
        $alphabet = range('A', 'Z');
        foreach ($alphabet as $letter){
            if (!isset($users[$letter])){
                $users[$letter] = [];
            }
        }

        // sort collection alphabetically
        $users = $users->sortKeys();

        return $users;
    }
}