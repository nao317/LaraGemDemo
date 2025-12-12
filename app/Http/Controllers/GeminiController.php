<?php

namespace App\Http\Controllers;

use App\Service\interact_gemini; // Gemini-Demo: app/Service/interact_gemini.php を利用する
use Illuminate\Http\Request; // Gemini-Demo: Requestクラスを利用するためuseする

class GeminiController extends Controller {

    public function ask (Request $request, interact_gemini $gemini) {
        $validated = $request->validate([
            'prompt' => 'required|string',
        ]);
        $text = $gemini->ask($validated['prompt']); // Gemini-Demo: interact_geminiクラスのaskメソッドを呼び出す
        return response()->json([
            'prompt' => $validated['prompt'],
            'response' => $text,
        ]);
    }
}
