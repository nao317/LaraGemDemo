<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController; // Gemini-Demo: GeminiControllerを利用するためuseする

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gemini', function () {
    return view('gemini-demo');
});

Route::post('/gemini', [GeminiController::class, 'ask']); // Gemini-Demo: POSTリクエストをGeminiController@askにルーティング
