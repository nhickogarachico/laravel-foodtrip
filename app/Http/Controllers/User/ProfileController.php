<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfileView($username) 
    {

        // check if username exists
        $user = User::where('username', $username)->first();

        if($user)
        {
            return view('screens.profile', [
                'user' => $user
            ]);
        } else 
        {
            return redirect('/');
        }
        
    }
}
