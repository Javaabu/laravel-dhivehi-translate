<?php

return [
	'key' => env('AZURETRAN_KEY', ''),
	'host' => env('AZURETRAN_HOST','https://api.cognitive.microsofttranslator.com'),
	'detectpath' => env('AZURETRAN_DETECT','/detect?api-version=3.0'),
	'transpath' => env('AZURETRAN_PATH', '/translate?api-version=3.0'),
	'transliterpath' => env('AZURETRANSLITERATE_PATH', '/transliterate?api-version=3.0'),
	'languagepath' => env('AZURELANGUAGE_PATH', '/languages?api-version=3.0')
];