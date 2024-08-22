<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証成功
            return redirect()->route('home');
        }

        // 認証失敗
        return redirect()->route('login.show')
                        ->withErrors(['email' => 'メールアドレスまたはパスワードが違います。']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
