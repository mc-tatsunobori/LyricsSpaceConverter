<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KAN GANA SPACE</title>
</head>
<body>
<h1>KAN GANA SPACE</h1>
<div>
    <form method="POST" action="/">
        @csrf
        <label for="kanji_to_hiragana_conversion_append_space_form">
            <textarea name="kanji_to_hiragana_conversion_append_space_form" placeholder="変換したい漢字を入力してね"></textarea>
        </label>
        <button>送信</button>
    </form>
</div>
<div>
    @isset($kanji_to_hiragana_conversion_append_space_form)
        <label for="resul">
            <textarea name="result" readonly>{{ $kanji_to_hiragana_conversion_append_space_form }}</textarea>
        </label>
    @endisset
</div>
</body>
</html>
