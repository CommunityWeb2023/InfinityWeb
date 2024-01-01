<?php

namespace Flyff\Modules\Account\Services;

use Flyff\Modules\Account\Models\Account;
use Flyff\Modules\Account\Repositories\AccountRepository;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AccountService
{


    public function __construct(
        private readonly AccountRepository $accountRepository,
        private readonly SettingService $settingService,
    ){}

    public function createAccount(string $account, string $password): bool
    {
        $password = $this->hashPassword($password);
        return $this->accountRepository->createAccountProc($account, $password, Auth::id());
    }

    private function hashPassword(string $password): string
    {
        return md5($this->settingService->getSetting()->password_hash . $password);
    }

    public function getAccounts(): Collection
    {
        return $this->accountRepository->getAccounts();
    }
}