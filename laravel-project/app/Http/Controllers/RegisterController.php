<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'user_name' => 'required|unique:users,user_name',
        'password' => 'required|confirmed|min:8',
        'batch' => 'required|integer|min:1|max:7',
    ]);

    $user = new User();
    $user->user_name = $request->user_name;
    $user->password = Hash::make($request->password);
    $user->batch = $request->batch;
    $user->save();

    // ユーザーをログインさせる
    Auth::login($user);

    // $ideas を取得
    $ideas = Idea::where('is_posted', '2')
                ->with('feedbacks')
                ->orderBy('created_at', 'desc')
                ->get();

    // home ルートに $ideas を渡す
    return redirect()->route('home')->with('ideas', $ideas);
}

public function whyEngineer(Request $request){

    $request->validate([
        'why_engineer' => 'required|min:1|max:90',
        ]);

    $user = Auth::user();
    $user->why_engineer = $request->why_engineer;
    $user->save();

    $userId = Auth::id();
    $ideas = Idea::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

    return view('APark.my_page', ['ideas' => $ideas]);
}

}
