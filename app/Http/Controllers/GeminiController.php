<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini; // .envファイルに書いたAPIKeyの読み込みとクライアントの作成を自動で行うためのライブラリ


class GeminiController extends Controller // GeminiControllerクラス
{
    public function index(Request $request) //
    {
        return view('index');
    }

    public function post(Request $request)
    {
        $request->validate([
            'sentence' => 'required',
        ]);

        $sentence = $request->input('sentence');
        $result = Gemini::generativeModel('gemini-2.5-flash')->generateContent($sentence);        
        $response_text = $result->text();

        return view('index', compact('sentence', 'response_text'));
    }
}