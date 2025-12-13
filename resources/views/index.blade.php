<html>
<head>
    <meta charset='utf-8' />
</head>
<body>
    <form method="POST">
        @csrf
        <input type="text" name="sentence" value="{{ isset($sentence) ? $sentence : '' }}">
        <button type="submit">質問する</button>
    </form>
    {{-- 結果 --}}
    {{ isset($response_text) ? $response_text : '' }}
</body>
</html>