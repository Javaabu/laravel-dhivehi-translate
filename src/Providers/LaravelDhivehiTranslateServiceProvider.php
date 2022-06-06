<?php

namespace Javaabu\LaravelDhivehiTranslate\Providers;

use ATran\Translate\ATran;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Javaabu\LaravelDhivehiTranslate\Api\MicrosoftApiTranslate;
use Javaabu\LaravelDhivehiTranslate\Commands\TranslateFilesCommand;
use Tanmuhittin\LaravelGoogleTranslate\Contracts\ApiTranslatorContract;

class LaravelDhivehiTranslateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->commands([
            TranslateFilesCommand::class
        ]);

        $this->publishes([
            __DIR__.'/config/javaabu_laravel_translate.php' => config_path('javaabu_laravel_translate.php'),
        ]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $config = resolve('config')->get('javaabu_laravel_translate');

        $this->app->singleton(ApiTranslatorContract::class, function ($app) use ($config) {
            return new MicrosoftApiTranslate(null);
        });

        $this->app->singleton('atran', function ($app) use ($config) {
            return new ATran(
                $config['atran']['key'],
                $config['atran']['host'],
                $config['atran']['detectpath'],
                $config['atran']['transpath'],
                $config['atran']['transliterpath'],
                $config['atran']['languagepath']
            );
        });

        $this->app->make('\ATran\Translate\PlayWithAPIController');


        Str::macro('javaabuTranslate', function (string $text, string $locale, string $base_locale = null) {
            $translator = resolve(MicrosoftApiTranslate::class);
            return $translator->translate($text, $locale, $base_locale);
        });
    }
}
