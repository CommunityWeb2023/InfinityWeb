<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Flyff\Modules\Settings\Services\SettingService;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
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
    public function boot(
        SettingService $settingService
    ): void
    {
        $this->configurePermissions();

        Fortify::loginView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/Login');
        });

        Fortify::registerView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/Register');
        });

        Fortify::twoFactorChallengeView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/TwoFactorChallenge');
        });

        Fortify::confirmPasswordView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/ConfirmPassword');
        });

        Fortify::verifyEmailView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/VerifyEmail');
        });

        Fortify::requestPasswordResetLinkView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/ForgotPassword');
        });

        Fortify::resetPasswordView(function () use ($settingService) {
            return Inertia::render($settingService->currentTheme(). '/Auth/ResetPassword');
        });


        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
