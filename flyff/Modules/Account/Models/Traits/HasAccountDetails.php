<?php

namespace Flyff\Modules\Account\Models\Traits;

use Flyff\Modules\Account\Models\AccountDetails;

trait HasAccountDetails
{

    public function accountDetails(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AccountDetails::class, 'account', 'account');
    }
}