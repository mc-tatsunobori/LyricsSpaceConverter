<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>漢字かな変換 〜スペースを添えて〜</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="mt-3">漢字かな変換 〜スペースを添えて〜</h1>
        <h5 class="mt-2 text-secondary">漢字を含む文字を全てひらがなに変えて、1文字ごとにスペースを挟むよ。</h5>
    </div>
    <div class="row align-items-center">
        <div class="col d-flex flex-column justify-content-center">
            <form method="POST" action="/">
                @csrf
                <div>
                    <label for="target_kanji" class="form-label h4 mt-3">変換したい漢字を含む文字を入力してね</label>
                    <textarea name="target_kanji" class="form-control" rows="6" required>{{ $req ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-2">変換</button>
            </form>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col d-flex flex-column justify-content-center">
            @isset($res)
                <form>
                    <div>
                        <label for="result" class="form-label h4 mt-5">出力結果</label>
                        <textarea class="form-control" name="result" disabled readonly rows="6">{{ $res }}</textarea>
                    </div>
                </form>
            @endisset
        </div>
    </div>
</div>
</body>
</html>
