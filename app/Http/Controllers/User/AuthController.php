<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginView()
    {
        return view('screens.login');
    }

    public function login(Request $request)
    {
        //validate request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'credentials' => 'Wrong credentials'
        ]);
    }
}
