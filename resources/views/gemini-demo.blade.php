<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gemini Demo</title>
    <style>
        body { font-family: sans-serif; line-height: 1.5; padding: 20px; }
        .container { max-width: 700px; margin: 0 auto; }
        textarea { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px 20px; border-radius: 5px; border: none; background-color: #007bff; color: white; cursor: pointer; }
        #loading { display: none; margin-top: 15px; }
        #response-container { margin-top: 20px; padding: 15px; border: 1px solid #eee; border-radius: 5px; background-color: #f9f9f9; white-space: pre-wrap; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gemini Flash Demo</h1>
        {{-- Gemini-Demo: プロンプトを送信するフォーム --}}
        <form id="gemini-form">
            @csrf
            <label for="prompt">プロンプトを入力してください:</label>
            <textarea name="prompt" id="prompt" rows="4" required></textarea>
            <br><br>
            <button type="submit">送信</button>
        </form>

        {{-- Gemini-Demo: ローディング表示 --}}
        <div id="loading">
            <p>生成中...</p>
        </div>

        {{-- Gemini-Demo: 結果を表示するコンテナ --}}
        <div id="response-container" style="display: none;"></div>
    </div>

    {{-- Gemini-Demo: 非同期通信を行うためのJavaScript --}}
    <script>
        document.getElementById('gemini-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);
            const prompt = formData.get('prompt');
            const loading = document.getElementById('loading');
            const responseContainer = document.getElementById('response-container');

            loading.style.display = 'block';
            responseContainer.style.display = 'none';

            fetch('/gemini', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                loading.style.display = 'none';
                // Gemini-Demo: 質問と回答を表示
                responseContainer.innerHTML = `<strong>質問:</strong><p>${data.prompt}</p><hr><strong>回答:</strong><p>${data.response}</p>`;
                responseContainer.style.display = 'block';
            })
            .catch(error => {
                loading.style.display = 'none';
                responseContainer.innerHTML = 'エラーが発生しました。';
                responseContainer.style.display = 'block';
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
