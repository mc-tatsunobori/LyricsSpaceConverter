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
    <h1 class="text-center mb-5 text-primary">LyricsSpaceConverter</h1>
    <h5 class="text-center mb-3">Muse◯core で連続で歌詞が入力できるようにするツールです。</h5>
    <h5 class="text-center mb-5">漢字を含む文字を全てひらがなに変えて、1文字ごとにスペースを挟んだ結果を返してくれるよ。</h5>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="/">
                @csrf
                <div class="form-group">
                    <label for="target_kanji" class="form-label h4">変換したい漢字を含む歌詞を入力してね</label>
                    <textarea name="target_kanji" class="form-control" rows="6"
                              required>{{ $request ?? old('target_kanji') }}</textarea>
                    @error('target_kanji')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">変換</button>
            </form>
        </div>
    </div>
    @isset($response)
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <label for="result" class="form-label h4">出力結果</label>
                <textarea class="form-control" name="result" disabled readonly rows="6">{{ $response }}</textarea>
            </div>
        </div>
    @endisset
</div>
</body>
</html>
