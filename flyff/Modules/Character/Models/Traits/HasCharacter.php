<?php

namespace Flyff\Modules\Character\Models\Traits;

use Flyff\Modules\Character\Models\Character;

trait HasCharacter
{
    public function characters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Character::class, 'account', 'account');
    }
}