<?php

namespace Javaabu\LaravelDhivehiTranslate\Providers;

use Illuminate\Support\ServiceProvider;
use Javaabu\LaravelDhivehiTranslate\EfaasProvider;

class LaravelDhivehiTranslateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $socialite = $this->app->make(\Laravel\Socialite\Contracts\Factory::class);

        $socialite->extend(
            'efaas',
            function ($app) use ($socialite) {
                $config = $app['config']['services.efaas'];
                return $socialite->buildProvider(EfaasProvider::class, $config);
            }
        );
    }
}
