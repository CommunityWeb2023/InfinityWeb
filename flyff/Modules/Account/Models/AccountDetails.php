<?php

namespace Flyff\Modules\Account\Models;

use App\Casts\CastAuthority;
use App\Casts\StringToLowerCast;
use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Account\Models\Traits\HasAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AccountDetails extends Model
{
    use HasFactory;
    use HasAccount;

    protected $connection = 'account';
    protected $table = 'ACCOUNT_TBL_DETAIL';

    protected $keyType = 'string';
    protected $primaryKey = 'account';

    public $timestamps = false;

    protected $casts = [
        'regdate' => 'datetime:l, d F Y H:i:s',
        'm_chLoginAuthority' => CastAuthority::class,
        'account' => StringToLowerCast::class
    ];



}
