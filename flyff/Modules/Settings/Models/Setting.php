<?php

namespace Flyff\Modules\Settings\Models;

use Flyff\Core\Database\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Setting
 * @package Flyff\Modules\Settings\Models
 * @property string $title
 * @property string $slogan
 * @property string $description
 * @property string $logo
 * @property int $exp_rate
 * @property int $drop_rate
 * @property int $penya_rate
 * @property string $discord
 * @property string $facebook
 * @property string $youtube
 * @property string $twitter
 * @property string $theme
 * @property string $language
 * @property string $timezone
 * @property int $maintenance
 * @property string $created_at
 * @property string $updated_at
 */
class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slogan',
        'description',
        'logo',
        'exp_rate',
        'drop_rate',
        'penya_rate',
        'discord',
        'facebook',
        'youtube',
        'twitter',
        'theme',
        'language',
        'timezone',
        'maintenance',
    ];
}
