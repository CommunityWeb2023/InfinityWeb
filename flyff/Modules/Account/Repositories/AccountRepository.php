<?php

namespace Flyff\Modules\Account\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountRepository extends BaseRepository
{
    public function createAccountProc(string $account, string $password, int $webId): bool
    {
        return DB::connection('account')->statement("EXEC [dbo].[usp_CreateNewAccountInfinityWeb] @account = ?, @pw = ?, @email = ?, @webid = ?", [
            $account,
            $password,
            null,
            $webId
        ]);

    }


    public function getAccounts()
    {
        return Auth::user()->accounts()->get();
    }
}