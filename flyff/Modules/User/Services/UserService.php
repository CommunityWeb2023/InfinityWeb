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
}