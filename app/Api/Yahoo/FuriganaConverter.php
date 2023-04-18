<?php

namespace App\Api\Yahoo;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class FuriganaConverter
{
    private const REQUEST_URL = 'https://jlp.yahooapis.jp/FuriganaService/V2/furigana';
    private const CONTENT_TYPE = 'application/json';
    private string $userAgent;

    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->userAgent = config('app.yahoo_app_token');
    }

    /**
     * @param string $params
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(string $params): ResponseInterface
    {
        $headers = [
            'User-Agent' => $this->userAgent,
            'Content-Type' => self::CONTENT_TYPE,
        ];
        $body = [
            "id" => "1234-1",
            "jsonrpc" => "2.0",
            "method" => "jlp.furiganaservice.furigana",
            "params" => [
                "q"=> $params
            ]
        ];

        try {
            return $this->client->post(self::REQUEST_URL, [
                'headers' => $headers,
                'json' => $body,
            ]);
        } catch (GuzzleException $e) {
            report($e);
            throw $e;
        }
    }
}
