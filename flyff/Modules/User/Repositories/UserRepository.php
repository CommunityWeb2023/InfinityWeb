<?php

namespace Flyff\Modules\User\Repositories;

use App\Models\User;
use Flyff\Core\Database\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    public function getUserByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public function getAllUsers()
    {
        return User::all();
    }


    public function saveUser(User $user): void
    {
        $user->save();
    }

    public function getLastUsersToday()
    {
           return User::where('created_at', '>=', date('Y-m-d'))->get();
    }

    public function getLastUserYesterday()
    {
        return User::where('created_at', '>=', date('Y-m-d', strtotime('-1 day')))->get();
    }

    public function getUserById(int $id)
    {
        return User::where('id', $id)->with(['accounts', 'authentications'])->first();
    }
}