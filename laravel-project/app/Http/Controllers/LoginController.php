<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
use App\Models\Feedback;
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

        if (Auth::attempt($credentials)) {
            //認証成功
            $ideas = Idea::where('is_posted', '2')
            ->with('feedbacks')
            ->orderBy('created_at', 'desc')
            ->get();

            $userName = Auth::user()->user_name;

            return view('APark.home', [
                'ideas' => $ideas,
                'userName' => $userName
            ]);
        }

        // 認証失敗
        return redirect()->route('login')
                        ->withErrors(['user_name' => 'ユーザー名またはパスワードが違います。']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('start');
    }
}
