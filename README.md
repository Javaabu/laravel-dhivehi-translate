# Laravel Dhivehi Translate

[![Latest Version on Packagist](https://img.shields.io/packagist/v/javaabu/laravel-dhivehi-translate.svg?style=flat-square)](https://packagist.org/packages/javaabu/laravel-dhivehi-translate)
[![Build Status](https://img.shields.io/travis/javaabu/laravel-dhivehi-translate/master.svg?style=flat-square)](https://travis-ci.org/javaabu/laravel-dhivehi-translate)
[![Quality Score](https://img.shields.io/scrutinizer/g/javaabu/laravel-dhivehi-translate.svg?style=flat-square)](https://scrutinizer-ci.com/g/javaabu/laravel-dhivehi-translate)
[![Total Downloads](https://img.shields.io/packagist/dt/javaabu/laravel-dhivehi-translate.svg?style=flat-square)](https://packagist.org/packages/javaabu/laravel-dhivehi-translate)

Translates Laravel language files to Dhivehi

## Installation

You can install the package via composer:

``` bash
composer require javaabu/laravel-dhivehi-translate
```

**Laravel 5.5** and above uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

After updating composer, add the ServiceProvider to the providers array in config/app.php

``` bash
Javaabu\LaravelDhivehiTranslate\LaravelDhivehiTranslateServiceProvider::class,
```

### Publish config files

This package essentially creates a Microsoft Translator driver for [tanmuhittin/laravel-google-translate](https://github.com/tanmuhittin/laravel-google-translate) package using the [InputOutputZ/ATran](https://github.com/InputOutputZ/ATran) package.
So this package will publish modified versions of config files from those packages named `atran.php` and `laravel_google_translate.php`.

```bash
php artisan vendor:publish --force --provider="Javaabu\LaravelDhivehiTranslate\LaravelDhivehiTranslateServiceProvider"
```

### Add Microsoft Azure Translation API Key to .env

```dotenv
AZURETRAN_KEY=xxxxxxxxxxxxxx
```

### Usage

Then you can run

```bash
php artisan translate:files
```

See it on action:<br>

<img src="http://muhittintan.com/tanmuhittin-laravel-google-translate.gif" alt="laravel-google-translate" />

## Str facade api-translation helpers

This package provides two translation methods for Laravel helper Str
* `Illuminate\Support\Str::apiTranslate` -> Translates texts using your selected api in config
* `Illuminate\Support\Str::apiTranslateWithAttributes` -> Again translates texts using your selected api in config
  in addition to that this function ***respects Laravel translation text attributes*** like :name  

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@javaabu.com instead of using the issue tracker.

## Credits

- [Javaabu Pvt. Ltd.](https://github.com/javaabu)
- [Mohamed Jailam](http://github.com/muhammedjailam)
- [Arushad Ahmed (@dash8x)](http://arushad.org)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
