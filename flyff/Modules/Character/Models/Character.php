<?php

namespace Flyff\Modules\Character\Models;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Account\Models\Traits\HasAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Character extends Model
{
    use HasFactory;
    use HasAccount;

    protected $connection = 'character';
    protected $table = 'CHARACTER_TBL';
    protected $primaryKey = 'm_idPlayer';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'm_idPlayer' => 'string',
        'CreateTime' => 'datetime:l, d F Y H:i:s',
    ];

    protected $hidden = [
        'account', 'serverindex', 'm_idPlayer'
    ];


}
