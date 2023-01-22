<?php

namespace App\Api\Yahoo;

use Illuminate\Support\Facades\Http;

class FuriganaService
{
    /**
     * @param string $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function post(string $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        $headers = [
            'User-Agent' => config('app.yahoo_app_token'),
            'Content-Type' => 'application/json'
        ];
        $body = [
            "id" => "1234-1",
            "jsonrpc" => "2.0",
            "method" => "jlp.furiganaservice.furigana",
            "params" => [
                "q"=> $params
            ]
        ];
        // TODO: エラー処理作成予定。
        $request = Http::withHeaders($headers)->post('https://jlp.yahooapis.jp/FuriganaService/V2/furigana', $body);
        return $request;
    }
}
