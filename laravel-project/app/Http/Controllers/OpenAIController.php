<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use App\Models\Idea; // Ideaモデルをインポート

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generate(Request $request)
    {
        $prompt = $request->input('prompt');
        $generatedText = $this->openAIService->generateText($prompt);

        // 投稿されたアイデアのみを取得
        $ideas = Idea::where('is_posted', '2')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('APark.home', compact('generatedText', 'ideas'));
    }
}
