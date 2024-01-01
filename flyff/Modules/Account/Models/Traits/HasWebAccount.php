<?php

namespace Flyff\Modules\Account\Models\Traits;

use App\Models\User;

trait HasWebAccount
{
    public function web_account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'webid', 'id', 'account');
    }
}