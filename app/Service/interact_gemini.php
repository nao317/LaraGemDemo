<?php

namespace App\Service; // Gemini-Demo: クラスとして利用するためnamespaceを定義

use Gemini\Laravel\Facades\Gemini;

class interact_gemini { // Gemini-Demo: クラスを定義

    public function ask(string $prompt) { // Gemini-Demo: プロンプトを引数で受け取るaskメソッドを定義
        // Gemini-Demo: gemini-1.5-flash-latestモデルを利用してコンテンツを生成し、テキストを返す
        return Gemini::gemini('gemini-1.5-flash-latest')
            ->generateContent($prompt)
            ->text();
    }
}
