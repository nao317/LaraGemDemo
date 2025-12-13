<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeminiController;

Route::get('/index', [GeminiController::class, 'index']);
Route::post('/index', [GeminiController::class, 'post']);

Route::get('/', function () {
    return view('welcome');
});
