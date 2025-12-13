<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini; // .envファイルに書いたAPIKeyの読み込みとクライアントの作成を自動で行うためのライブラリ


class GeminiController extends Controller // GeminiControllerクラス
{
    public function index(Request $request) 
    {
        return view('index'); // /indexにGeminiからの回答を乗せる
    }

    public function post(Request $request)
    {
        /* バリデーション */
        $request->validate([
            'sentence' => 'required', // 入力しないと送信ボタンを押せないようにする
        ]);

        $sentence = $request->input('sentence');
        $result = Gemini::generativeModel('gemini-2.5-flash')->generateContent($sentence);        
        $response_text = $result->text();

        return view('index', compact('sentence', 'response_text'));
    }
}