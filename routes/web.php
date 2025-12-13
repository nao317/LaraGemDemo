<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeminiController;

Route::get('/index', [GeminiController::class, 'index']); // GETリクエストのルーティング
Route::post('/index', [GeminiController::class, 'post']); // POSTリクエストのルーティング

Route::get('/', function () { // これはもとからあるやつ
    return view('welcome');
});
