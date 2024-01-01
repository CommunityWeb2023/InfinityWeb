<?php

namespace Flyff\Modules\Character\Models;

use App\Casts\JobCast;
use App\Casts\PlayTimeCast;
use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Account\Models\Traits\HasAccount;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;


class Character extends Model
{
    use HasFactory;
    use HasAccount;

    const STATUS_DELETED = 'D';
    const STATUS_AVAILABLE = 'F';

    protected $connection = 'character';
    protected $table = 'CHARACTER_TBL';
    protected $primaryKey = 'm_idPlayer';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'm_idPlayer' => 'string',
        'CreateTime' => 'datetime:l, d F Y',
        'TotalPlayTime' => PlayTimeCast::class,
        'm_nJob' => JobCast::class
    ];

    protected $hidden = [
        'account', 'serverindex', 'm_idPlayer'
    ];

    public function scopeIsUser(Builder $builder): Builder
    {
        return $builder->where('m_chAuthority', '=', 'F');
    }

    public function scopeOrderByLevel(Builder $builder): Builder
    {
        return $builder->orderBy('m_nLevel', 'desc');
    }

    public function scopeOrderByPlayTime(Builder $builder): Builder
    {
        return $builder->orderBy('TotalPlayTime', 'desc');
    }

    public function scopeUnblocked(Builder $builder): Builder
    {
        return $builder->where('BlockTime', '<', Carbon::now()->format('Ymd'));
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('isblock', $this::STATUS_AVAILABLE);
    }


}
