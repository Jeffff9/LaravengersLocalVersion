<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $message = "ログインしてください。";
        return view('auth.login');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);


            return redirect()->route('Place');
        } else {
            return redirect()->back()->withErrors(['login' => '認証情報が間違っています。']);
        }
    }


}
