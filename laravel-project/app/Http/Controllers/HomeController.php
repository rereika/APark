<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Create;

class HomeController extends Controller
{

    public function showStartPage(){
        return view('APark.start');
    }
    public function index()
    {
        return view('APark.home');
    }

    public function selectTheme($id)
    {
        return view('APark.select_theme', ['idea_id' => $id]);
    }


    public function createRadarChart(Request $request, $id)
    {
        $theme = $request->input('theme');

        if (empty($theme)) {
            return redirect()->back()->with('alert', '選択してください');
        }

        // アイデアのテーマをデータベースで更新
        $idea = Idea::find($id);
        $idea->theme = (int)$theme; // テーマを整数として保存
        $idea->save();

        return redirect()->route('get.create.radar.chart', ['id' => $id]);
    }




//     public function createRadarChart(Request $request, $id)
//     {
//         $theme = $request->input('theme');

//         if (empty($theme)) {
//             echo '<script>alert("テーマを入力してください");</script>';
//             return view('APark.select_theme', ['idea_id' => $id]);
//         } else {
//             return view('APark.create_radar_chart', ['idea_id' => $id]);
// }
//         // return view('APark.create_radar_chart', ['idea_id' => $id]);
//     }

    public function enterPitch($id)
    {
        return view('APark.enter_pitch', ['idea_id' => $id]);
    }

    public function createFeedback($id)
    {
        return view('APark.create_feedback', ['idea_id' => $id]);
    }

    public function myPage()
    {
        return view('APark.my_page');
    }
}
