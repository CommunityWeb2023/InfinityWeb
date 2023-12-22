<?php

namespace Flyff\Modules\Settings\Services;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Settings\Models\Setting;
use Flyff\Modules\Settings\Repositories\SettingRepository;

class SettingService
{


    public function __construct(
        private  readonly SettingRepository $settingRepository
    ){}

    public function getSetting()
    {
        return $this->settingRepository->getSetting();
    }

    public function currentTheme(): string
    {
        return $this->settingRepository->currentTheme();
    }

    public function getThemes(): array
    {
        $themes = [];
        $directories = glob(resource_path('js/Themes/*'), GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            $theme = basename($directory);
            if(file_exists(resource_path('js/Themes/' . $theme . '/theme.json'))){
                $themeJson = json_decode(file_get_contents(resource_path('js/Themes/' . $theme . '/theme.json')));
                if($themeJson->theme_type == 'frontend'){
                    $themes[$theme] = $themeJson;
                    // if this theme is the current theme, we set the active property to true
                    if($theme == $this->currentTheme()){
                        $themes[$theme]->active = true;
                    }
                }
            }
        }
        return $themes;
    }

    public function updateSetting(array $data): Model|Setting
    {
        $setting = $this->getSetting();
        $setting->fill($data);
        return $this->settingRepository->save($setting);
    }
}