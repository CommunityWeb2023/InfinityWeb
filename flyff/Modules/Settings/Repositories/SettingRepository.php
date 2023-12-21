<?php

namespace Flyff\Modules\Settings\Repositories;

use Flyff\Core\Database\Repository\BaseRepository;
use Flyff\Modules\Settings\Models\Setting;

class SettingRepository extends BaseRepository
{

    public function currentTheme(): string
    {
        return Setting::first()->theme;
    }

}