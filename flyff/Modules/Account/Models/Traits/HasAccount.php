<?php

namespace Flyff\Modules\Account\Models\Traits;

use Flyff\Modules\Account\Models\Account;

trait HasAccount
{
    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class, 'account', 'account');
    }
}