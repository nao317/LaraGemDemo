<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeminiAPI（2.5flash）チャットフォーム</title>
    
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div id="app-container">
        
        <header>
            <h1>Gemini AI チャットフォーム</h1>
        </header>

        <div class="form-section">
            <form method="POST" action="/index">
                @csrf
                <input 
                    type="text" 
                    name="sentence" 
                    placeholder="質問を入力してください..." 
                    value="{{ isset($sentence) ? $sentence : '' }}"
                    required
                >
                <button type="submit">送信</button>
            </form>
        </div>

        <div class="result-section">
            <h2>回答</h2>
            @if (isset($response_text) && $response_text)
                @if (isset($sentence))
                    <p class="question">Q: {{ $sentence }}</p>
                @endif
                <div class="response-text">
                    <pre>{{ $response_text }}</pre>
                </div>
            @else
                <p class="placeholder-text">ここにGeminiの応答が表示されます。</p>
            @endif
        </div>
    </div>
</body>
</html>