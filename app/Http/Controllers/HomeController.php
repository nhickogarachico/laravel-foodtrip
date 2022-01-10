<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHomeView()
    {

        //get user posts
        $userPosts = Auth::user()->posts->all();

        //get posts from friends
        $friends = Auth::user()->friends;

        foreach($friends as $friend)
        {
            $allPosts = array_merge($userPosts, $friend->posts->all());
        }
        // sort array by date
        $createdDate = array_column($allPosts, 'created_at');
        array_multisort($createdDate, SORT_DESC, $allPosts);
        return view('screens.home', [
            'posts' => $allPosts,
        ]);
    }
}
