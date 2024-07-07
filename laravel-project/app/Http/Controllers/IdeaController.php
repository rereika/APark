<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{

    // 新しいアイデアを作成するメソッド
    public function create(Request $request){

        // 新しいIdeaモデルのインスタンスを作成
        $idea = new Idea();


         // 初期値として空文字と０を設定
        $idea->theme = '';
        $idea->user_id = 0;
        $idea->self_chart1 = 0;
        $idea->self_chart2 = 0;
        $idea->self_chart3 = 0;
        $idea->self_chart4 = 0;
        $idea->self_chart5 = 0;
        $idea->elevator1 = '';
        $idea->elevator2 = '';
        $idea->how = '';


        // モデルのインスタンスをデータベースに保存
        $idea->save();

        return redirect()->route('get.select.theme', ['id' => $idea->id]);
    }

    // テーマを更新するメソッド
    public function updateTheme(Request $request, $id)
    {
        $request->validate([
            'theme' => 'required|string',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->theme = $request->theme;
        $idea->save();

        return redirect()->route('some.next.page'); // 適切なページにリダイレクト
    }

    public function updateChart(Request $request, $id)
    {
        $validated = $request->validate([
            'self_chart1' => 'required|numeric|min:0|max:5',
            'self_chart2' => 'required|numeric|min:0|max:5',
            'self_chart3' => 'required|numeric|min:0|max:5',
            'self_chart4' => 'required|numeric|min:0|max:5',
            'self_chart5' => 'required|numeric|min:0|max:5',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->self_chart1 = $validated['self_chart1'];
        $idea->self_chart2 = $validated['self_chart2'];
        $idea->self_chart3 = $validated['self_chart3'];
        $idea->self_chart4 = $validated['self_chart4'];
        $idea->self_chart5 = $validated['self_chart5'];
        $idea->save();

        return response()->json(['success' => true]);
    }

    public function updateElevator(Request $request, $id)
    {
        $request->validate([
            'elevator1' => 'required|text',
            'elevator2' => 'required|text',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->elevator1 = $request->elevator1;
        $idea->elevator2 = $request->elevator2;
        $idea->save();

        return redirect()->route('some.next.page'); // 適切なページにリダイレクト
    }
}
