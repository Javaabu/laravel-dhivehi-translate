<?php

namespace Javaabu\LaravelDhivehiTranslate\Api;

use Tanmuhittin\LaravelGoogleTranslate\Contracts\ApiTranslatorContract;

class MicrosoftApiTranslate implements ApiTranslatorContract
{
    /** @var ATran */
    public $handle;

    public function __construct($api_key)
    {
       $this->handle = new ATran(
           $api_key,
           config('atran.host'),
           config('atran.detectpath'),
           config('atran.transpath'),
           config('atran.transliterpath'),
           config('atran.languagepath')
       );
    }

    public function translate(string $text, string $locale, string $base_locale = null): string
    {
        return $this->handle->translateText($text, $locale);
    }
}
