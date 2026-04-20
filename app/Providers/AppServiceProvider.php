<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $appUrl = (string) config('app.url', '');
        $assetUrl = config('app.asset_url');

        if (is_string($assetUrl) && str_starts_with($assetUrl, 'http://')) {
            config(['app.asset_url' => preg_replace('/^http:\/\//', 'https://', $assetUrl)]);
        }

        $shouldForceHttps = str_starts_with($appUrl, 'https://')
            || request()->isSecure()
            || request()->header('x-forwarded-proto') === 'https';

        if ($shouldForceHttps) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view): void {
            $view->with('siteSetting', SiteSetting::query()->first());
        });
    }
}
