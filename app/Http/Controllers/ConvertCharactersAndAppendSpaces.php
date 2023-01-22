<?php

namespace App\Http\Controllers;

use App\Api\Yahoo\FuriganaService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class ConvertCharactersAndAppendSpaces extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     * @throws \JsonException
     */
    public function post(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $furiganaService = new FuriganaService();
        $response = $furiganaService->post($request->target_kanji);
        $decode_response = json_decode($response->body(), false, 512, JSON_THROW_ON_ERROR);
        $hiragana = $this->convertWordsToHiraganaString($decode_response->result->word);
        $append_space_hiragana = implode(' ', str_split($hiragana,3));
        return view('index', ['req' =>  $request->target_kanji, 'res' => $append_space_hiragana]);
    }

    /**
     * @param array $words
     * @return string
     */
    private function convertWordsToHiraganaString(array $words): string
    {
        $hiragana = '';

        foreach ($words as $word) {
            if (property_exists($word,'furigana') === false){
                continue;
            }
            $hiragana .= $word->furigana;
        }
        return $hiragana;
    }
}
