<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('user_name', 'password');

        // if (Auth::attempt($credentials)) {
        //     // 認証成功
        //     return redirect()->route('APark.home');
        // }

            if (Auth::attempt($credentials)) {
                //認証成功
                $ideas = Idea::where('is_posted', '2')
                ->with('feedbacks')
                ->orderBy('created_at', 'desc')
                ->get();

                return view('APark.home', ['ideas' => $ideas]);
                }

        // 認証失敗
        return redirect()->route('login.show')
                        ->withErrors(['user_name' => 'ユーザー名またはパスワードが違います。']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('start');
    }

}
