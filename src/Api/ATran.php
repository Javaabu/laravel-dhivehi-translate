<?php

namespace Javaabu\LaravelDhivehiTranslate\Api;

use ATran\Translate\Entities\DetectedLanguage;
use ATran\Translate\Entities\Translations;
use GuzzleHttp\Client;
use Tebru\Gson\Gson;

class ATran extends \ATran\Translate\ATran
{

    /**
     * Fixing the headers of original ATran
     *
     * @param $contentLength
     * @param $clientTraceId
     * @return Client
     */
    public function setupClient($contentLength = null, $clientTraceId = null)
    {
        $headers = [
            'Content-Type' => 'application/json; charset=UTF-8',
            'Ocp-Apim-Subscription-Key' => $this->key,
            'Accept' => 'application/json',
            'charset' => 'utf-8',
            'X-ClientTraceId' => $clientTraceId
        ];

        if ($contentLength) {
            $headers['Content-Length'] = $contentLength;
        }

        return new Client(['headers' => $headers, 'base_uri' => $this->host]);
    }

    protected function maybeThrowException($result)
    {
        if (is_array($result) && isset($result['exception'])) {
            throw $result['exception'];
        }

        return $result;
    }

    public function detectTextsInformation($texts)
    {
        return $this->maybeThrowException(parent::detectTextsInformation($texts));
    }

    public function detectTextInformation($text)
    {
        return $this->maybeThrowException(parent::detectTextInformation($text));
    }

    public function transliterateTextInformation($text, $language, $fromscript, $toscript)
    {
        return $this->maybeThrowException(parent::transliterateTextInformation($text, $language, $fromscript, $toscript));
    }

    public function translateText($text, $to)
    {
        $body = [
            'json' => array(['text' => iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text)])
        ];

        $this->http = $this->setupClient($this->getTextJsonBodyLength($text), $this->com_create_guid());
        $tos = explode(",", $to);
        $translatequeries = "";
        if (count($tos) > 1) {
            foreach($tos as $to) {
                $translatequeries .= "&to=" . $to;
            }
        } else {
            $translatequeries = "&to=" . $to;
        }

        $response = $this->http->post($this->transpath . $translatequeries, $body);

        $responseBody = $response->getBody();
        $decodedBodyJson = json_decode($responseBody, JSON_UNESCAPED_UNICODE);
        $encodedBodyJson = json_encode($decodedBodyJson[0], JSON_UNESCAPED_UNICODE);
        $gson = Gson::builder()->build();
        $translationObject = $gson->fromJson($encodedBodyJson, Translations::class);
        $translationObject->detectedLanguage = new DetectedLanguage($decodedBodyJson[0]['detectedLanguage']);

        return $translationObject->translations[0]['text'] ?? '';
    }

    public function transliterationsAvailable($languagecode = null)
    {
        return $this->maybeThrowException(parent::transliterationsAvailable($languagecode));
    }

    public function translationsAvailable($languagecode = null)
    {
        return $this->maybeThrowException(parent::translationsAvailable($languagecode));
    }
}
