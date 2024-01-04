<?php

namespace Flyff\Modules\Account\Models;

use App\Casts\StringToLowerCast;
use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Account\Models\Traits\HasAccountDetails;
use Flyff\Modules\Account\Models\Traits\HasWebAccount;
use Flyff\Modules\Character\Models\Traits\HasCharacter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;


class Account extends Model
{
    use HasFactory;
    use HasWebAccount;
    use HasAccountDetails;
    use HasCharacter;
    use Searchable;

    protected $connection = 'account';
    protected $table = 'ACCOUNT_TBL';
    protected $primaryKey = 'account';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'account' => StringToLowerCast::class,  // must cast to lowercase to get the correct characters
    ];

    protected $with = ['accountDetails', 'characters'];


    protected $hidden = [
        'password', 'OldPassword', 'TempPassword', 'id_no1', 'id_no2', 'reload', 'cash', 'webid'
    ];

    public function searchableAs()
    {
        return 'account_index';
    }

    public function toSearchableArray()
    {
        return [
            'account' => $this->account,
        ];
    }
}
