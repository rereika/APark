<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class OpenAIController extends Controller
{
    private $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generate(Request $request)
    {
        $prompt = $request->input('prompt', 'default prompt'); // 'prompt' をリクエストから取得
        $generatedText = $this->openAIService->generateText($prompt); // OpenAIService を使ってテキスト生成

        // 文字数制限を設定する（例：100文字に制限）
        $maxLength = 3;
        $generatedText = substr($generatedText, 0, $maxLength);

        // 結果をビューに渡して表示
        return view('APark.home', ['generatedText' => $generatedText]);
    }

}
