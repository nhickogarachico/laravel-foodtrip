<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function showProfileView($username)
    {

        // check if username exists
        $user = User::where('username', $username)->first();

        if ($user) {
            // fetch all posts of this user
            $posts = $user->posts;
            
            return view('screens.profile', [
                'user' => $user,
                'posts' => $posts
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
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'bio' => 'max:255',
            'avatar' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        if ($request->file('avatar')) {
            // Check if profile directory exists
            $avatarDirectory = 'images/database/' .$user->id .'/profiles';

            if (!File::exists($avatarDirectory)) {
                File::makeDirectory($avatarDirectory, 0777, true);
            }

            //image name
            $avatarName = time() . $user->username . '.' . $request->file('avatar')->extension();
            $avatarPath = "/" . $avatarDirectory . "/" . $avatarName;

            $request->file('avatar')->move(public_path($avatarDirectory), $avatarName);
            $user->avatar = $avatarPath;
        }


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
