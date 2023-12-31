<?php

namespace App\Http\Middleware;

use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{

    public function __construct(
        private readonly SettingService $settingService
    ){}

    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'server' => [
                'name' => $this->settingService->getSetting()->title,
                'slogan' => $this->settingService->getSetting()->slogan,
                'description' => $this->settingService->getSetting()->description,
                'logo' => $this->settingService->getSetting()->logo,
                'theme' => $this->settingService->currentTheme(),
                'language' => $this->settingService->getSetting()->language,
                'timezone' => $this->settingService->getSetting()->timezone,
            ],
            'current_timezone' => config('app.timezone'),
            'isDemo' => config('app.demo'),
            'penya' => $this->settingService->getSetting()->penya_rate,
            'exp' => $this->settingService->getSetting()->exp_rate,
            'drop' => $this->settingService->getSetting()->drop_rate,
            'url_parameters' => [
                'query' => $request->get('query') ?? ''
            ],
            'view_dashboard' => Auth::user() ? Auth::user()->hasPermissionTo('view dashboard') : false,
            'maintenance' => $this->settingService->isMaintenance(),
            'social_media' => [
                'discord' => $this->settingService->getSetting()->discord,
                'facebook' => $this->settingService->getSetting()->facebook,
                'twitter' => $this->settingService->getSetting()->twitter,
                'youtube' => $this->settingService->getSetting()->youtube,
                'instagram' => $this->settingService->getSetting()->instagram,
                'twitch' => $this->settingService->getSetting()->twitch,
            ]
        ]);
    }
}
