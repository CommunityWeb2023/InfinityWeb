<?php

namespace Flyff\Modules\User\Models\Traits;

use Flyff\Modules\Account\Models\Account;

trait HasAccounts
{
    public function accounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Account::class, 'webid', 'id');
    }
}