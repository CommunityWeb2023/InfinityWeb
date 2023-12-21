<?php

namespace Flyff\Modules\Settings\Services;

use Flyff\Modules\Settings\Repositories\SettingRepository;

class SettingService
{


    public function __construct(
        private  readonly SettingRepository $settingRepository
    ){}



    public function currentTheme(): string
    {
        return $this->settingRepository->currentTheme();
    }
}