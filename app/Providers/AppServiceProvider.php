<?php

namespace App\Providers;

use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(SettingService $settingService): void
    {
        //config(['app.timezone' => $settingService->getSetting()->timezone]);
    }
}
