<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {   
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        
        Request::macro('isAgent', function () {
            return $this->getHost() === adminUrl();
        });

        Request::macro('isWeb', function () {
            return $this->getHost() === baseUrl();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
