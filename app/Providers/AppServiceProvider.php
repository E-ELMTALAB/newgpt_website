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
        if ($this->app->environment('production')) {
            $appUrl = (string) config('app.url', '');
            if (str_starts_with($appUrl, 'http://')) {
                URL::forceRootUrl(preg_replace('/^http:\/\//', 'https://', $appUrl) ?? $appUrl);
            }

            $assetUrl = config('app.asset_url');
            if (is_string($assetUrl) && str_starts_with($assetUrl, 'http://')) {
                config(['app.asset_url' => preg_replace('/^http:\/\//', 'https://', $assetUrl)]);
            }

            URL::forceScheme('https');
        }

        View::composer('*', function ($view): void {
            $view->with('siteSetting', SiteSetting::query()->first());
        });
    }
}
