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
Javaabu\LaravelDhivehiTranslate\Providers\LaravelDhivehiTranslateServiceProvider::class,
```


### Add configuration to `config/services.php`

```php
'efaas' => [    
    'client_id' => env('EFAAS_CLIENT_ID'),  
    'client_secret' => env('EFAAS_CLIENT_SECRET'),  
    'redirect' => env('EFAAS_REDIRECT_URI'),
    'mode' => env('EFAAS_MODE', 'development'), // supports production, development            
],
```

### Usage

**Note:** A demo implementation of this package is available [here](https://github.com/ncit-devs/Efaas-Implementation-Javaabu).

You should now be able to use the provider like you would regularly use Socialite (assuming you have the facade installed):
Refer to the [Official Social Docs](https://laravel.com/docs/8.x/socialite#routing) for more info.

**Warning:** If you get `403 Forbidden` error when your Laravel app makes requests to the eFaas authorization endpoints, request NCIT to whitelist your server IP.

```php
return Socialite::driver('efaas')->redirect();
```

and in your callback handler, you can access the user data like so.

```
$efaas_user = Socialite::driver('efaas')->user();
$access_token = $efaas_user->token;
```

  

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
- - [Arushad Ahmed (@dash8x)](http://arushad.org)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
