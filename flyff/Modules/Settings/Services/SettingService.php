<?php

namespace Flyff\Modules\Settings\Services;

class SettingService
{


    public function __construct(
        private  readonly SettingRepository $settingRepository
    ){}
}