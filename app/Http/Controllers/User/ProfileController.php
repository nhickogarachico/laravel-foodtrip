<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function showProfileView($username)
    {

        // check if username exists
        $user = User::where('username', $username)->first();

        if ($user) {
            return view('screens.profile', [
                'user' => $user
            ]);
        } else {
            return redirect('/');
        }
    }

    public function editProfileView($username)
    {
        // check if username exists
        $user = User::where('username', $username)->first();

        if ($user) {
            return view('screens.edit-profile', [
                'user' => $user
            ]);
        } else {
            return redirect('/');
        }
    }

    public function updateProfile(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($user->id) ],
            'bio' => 'max:255'
        ]);

        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->username = $request->input('username');
        $user->birthday = $request->input('birthday');
        $user->bio = $request->input('bio');

        $user->save();

        return back()->with([
            'success' => 'Updated profile successfully'
        ]);
    }
}
