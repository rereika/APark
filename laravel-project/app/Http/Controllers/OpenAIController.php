<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Log クラスのインポートを追加
use App\Services\OpenAIService;
use App\Models\Idea;
use App\Models\Feedback;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    public function generateAndRedirect(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);

        $idea->elevator1 = $request->elevator1;
        $idea->elevator2 = $request->elevator2;
        $idea->how = $request->how;

        if ($request->input('action') === 'return_page') {
            return view('APark.create_radar_chart', ['idea_id' => $idea->id]);

        } elseif ($request->input('action') === 'draft') {
            $idea->is_posted = '1';
            $idea->save();
            $ideas = Idea::where('is_posted', '1')->orderBy('created_at', 'desc')->get();
            return view('APark.draft', ['ideas' => $ideas, 'idea_id' => $id]);

        } elseif ($request->input('action') === 'delete') {
            try {
                $idea->delete();
                return redirect()->route('home')->with('success', 'アイデアが削除されました');
            } catch (\Exception $e) {
                return redirect()->route('home')->with('error', $e->getMessage());
            }

        } elseif ($request->input('action') === 'proceed') {
            $idea->is_posted = '1';
            $idea->save();

            $prompts = [
                "このアイデアが他のアプリと比べてどれほどユニークか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアはHTML、CSS、JavaScript、Laravelで作成できるか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアは新しいか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアはユーザーの可能性を広げるか、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}",
                "このアイデアのどこが創造的か、1から5のスケールで評価してください: {$request->elevator1}, {$request->elevator2}, {$request->how}"
            ];

            $feedback = new Feedback();
            $feedback->idea_id = $idea->id;

            foreach ($prompts as $index => $prompt) {
                $response = $this->openAIService->generateText($prompt);
                Log::info(['prompt_response' => $response]); // レスポンスをログに出力

                // レスポンスから数値を抽出（例: "5" のような評価を期待している場合）
                preg_match('/(\d)/', $response, $matches);
                $scoreValue = isset($matches[1]) ? intval($matches[1]) : 0;
                $feedback->{'fb_chart' . ($index + 1)} = $scoreValue;
                $feedback->{'comment' . ($index + 1)} = $response;
            }

            // デバッグ用のフィードバックデータをログに出力
            Log::info(['feedback' => $feedback]);

            $feedback->save();

            return view('APark.create_feedback', ['idea' => $idea, 'feedback' => $feedback]);
        } else {
            return redirect()->route('home')->with('error', '無効なアクションが指定されました');
        }
    }
}
