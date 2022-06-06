<?php

namespace Javaabu\LaravelDhivehiTranslate\Api;

use ATran\Translate\Facades\ATran;
use Tanmuhittin\LaravelGoogleTranslate\Contracts\ApiTranslatorContract;

class MicrosoftApiTranslate implements ApiTranslatorContract
{
    public $handle;

    public function __construct($api_key)
    {

    }

    public function translate(string $text, string $locale, string $base_locale = null): string
    {
        preg_match('/:\S*/', $text, $param_array);

        $translation = ATran::translateText($text, $locale);

        dd($translation);

        return $translation;
    }
}
