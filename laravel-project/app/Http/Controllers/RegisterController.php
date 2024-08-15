<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea; // 追加
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'student_year' => 'required|integer|min:1|max:7',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->student_year = $request->student_year;
        $user->save();

        // $ideas を取得
        $ideas = Idea::where('is_posted', '2')
                    ->with('feedbacks')
                    ->orderBy('created_at', 'desc')
                    ->get();

        // home ルートに $ideas を渡す
        return redirect()->route('home')->with('ideas', $ideas);
    }
}
