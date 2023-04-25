<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LyricsSpaceConverter</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container py-5">
    <h1 class="text-center mb-5 text-dark">LyricsSpaceConverter</h1>
    <h5 class="mb-3 text-dark">Muse◯core で連続で歌詞が入力できるようにするツールです。</h5>
    <h5 class="mb-5 text-dark">漢字を含む文字を全てひらがなに変えて、1文字ごとにスペースを挟んだ結果を返してくれるよ。</h5>
    <div class="row justify-content-around">
        <div class="col-lg-5">
            <form method="POST" action="/">
                <button type="submit" class="btn text-dark pneumophism-el mb-3">
                    <i class="fa-solid fa-rotate"></i>
                    変換
                </button>
                @csrf
                <div class="form-group">
                    <textarea name="target_kanji" class="form-control custom-textarea pneumophism-el border-0" rows="6"
                              placeholder="変換したい漢字を含む歌詞を入力してね"
                              required>{{ $request ?? old('target_kanji') }}</textarea>
                    @error('target_kanji')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </form>
        </div>
        <div class="col-lg-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-right fa-2xl mt-3"></i>
        </div>
        <div class="col-lg-5">
            <button id="copyButton" type="submit" class="btn text-dark pneumophism-el mb-3">
                <i class="fa-regular fa-clipboard"></i>
                コピー
            </button>
            <textarea id="resultTextarea" class="form-control custom-textarea pneumophism-el border-0" name="result" disabled readonly
                      rows="6">{{ $response ?? null }}</textarea>
        </div>
    </div>
</div>
<script src="{{ asset('js/copy-text.js') }}"></script>
</body>
</html>
