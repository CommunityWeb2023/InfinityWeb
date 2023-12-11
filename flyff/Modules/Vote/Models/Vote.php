<?php

namespace Flyff\Modules\Vote\Models;

use Flyff\Core\Database\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $success
 * @property string $site
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'success',
        'site',
        'description',
        'ping_back_ips'
    ];

    protected $casts = [
        'ping_back_ips' => 'array'
    ];
}
