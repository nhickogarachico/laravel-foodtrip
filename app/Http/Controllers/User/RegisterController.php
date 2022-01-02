<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterView() 
    {
        return view('screens.register');
    }

    public function registerNewUser(Request $request)
    {
        //validate
        $request->validate([
            'username' => 'required|unique:users|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'firstName' => 'required',
            'lastName' => 'required'
        ]);

        //store to database
        $user = User::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        Auth::login($user);
        
        //errors if validation error
        return redirect('/');
    }
}
