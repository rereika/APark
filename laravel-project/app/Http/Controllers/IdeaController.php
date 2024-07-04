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

        return redirect()->route('select.theme', ['id' => $idea->id]);
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
}
