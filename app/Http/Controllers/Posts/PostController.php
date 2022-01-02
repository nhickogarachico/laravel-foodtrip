<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addNewPost(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'content' => 'required'
        ]);

        Post::create([
            'content' => $request->input('content'),
            'user_id' => $userId,
        ]);

        return back()->with([
            'success' => 'Added new post succesfully'
        ]);
    }

    public function showPostView($username, $postId)
    {
        $post = Post::where('id', $postId)->first();
        $user = $post->user;
        
        return view('screens.post', [
            'user' => $user,
            'post' => $post
        ]);
    }
}
