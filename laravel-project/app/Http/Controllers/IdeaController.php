<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required|integer',
            'self_chart1' => 'required|integer',
            'self_chart2' => 'required|integer',
            'self_chart3' => 'required|integer',
            'self_chart4' => 'required|integer',
            'self_chart5' => 'required|integer',
        ]);

        // 新しいIdeaモデルのインスタンスを作成
        $idea = new Idea();

        // 現在ログインしているユーザーのIDを取得し、user_id属性に設定する
        $idea->user_id = Auth::id();

        //: リクエストから取得したデータをIdeaモデルのそれぞれの属性に設定する
        $idea->theme = $request->theme;
        $idea->self_chart1 = $request->self_chart1;
        $idea->self_chart2 = $request->self_chart2;
        $idea->self_chart3 = $request->self_chart3;
        $idea->self_chart4 = $request->self_chart4;
        $idea->self_chart5 = $request->self_chart5;

        // モデルのインスタンスをデータベースに保存
        $idea->save();


        //保存が成功したことをJSON形式で返す
        return response()->json(['success' => true]);
    }
}
