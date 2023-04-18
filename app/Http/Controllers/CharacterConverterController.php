<?php

namespace App\Http\Controllers;

use App\Api\Yahoo\FuriganaConverter;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use JsonException;

class CharacterConverterController extends Controller
{
    /**
     * Show the index page.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('index');
    }

    /**
     * Convert target kanji to hiragana and append spaces.
     *
     * @param Request $request
     * @param FuriganaConverter $furiganaConverter
     * @return Application|Factory|View
     * @throws JsonException
     */
    public function convert(Request $request, FuriganaConverter $furiganaConverter): Application|Factory|View
    {
        $request->validate([
            'target_kanji' => 'required|max:255'
        ], [], [
            'target_kanji.required' => '変換対象の文字列を入力してください。',
            'target_kanji.max' => '変換対象の文字列は:max文字以内で入力してください。',
        ]);

        $targetKanji = $request->input('target_kanji');

        try {
            $response = $furiganaConverter->post($targetKanji);
            $decodeResponse = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            $hiragana = $this->convertWordsToHiraganaString($decodeResponse['result']['word']);
            $appendSpaceHiragana = implode(' ', str_split($hiragana, 3));
        } catch (GuzzleException $e) {
            abort($e->getCode());
        }
        return view('index', ['request' => $request->input('target_kanji'), 'response' => $appendSpaceHiragana]);
    }

    /**
     * Convert words array to hiragana string.
     *
     * @param array $words
     * @return string
     */
    private function convertWordsToHiraganaString(array $words): string
    {
        $hiragana = '';

        foreach ($words as $word) {
            if (!isset($word['furigana'])) {
                continue;
            }
            $hiragana .= $word['furigana'];
        }
        return $hiragana;
    }

}
