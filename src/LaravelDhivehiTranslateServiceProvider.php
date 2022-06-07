<?php

namespace Javaabu\LaravelDhivehiTranslate;

use Illuminate\Support\ServiceProvider;

class LaravelDhivehiTranslateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/atran.php' => config_path('atran.php'),
        ]);

        $this->publishes([
            __DIR__ . '/config/laravel_google_translate.php' => config_path('laravel_google_translate.php'),
        ]);

    }
}
