<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addNewComment(Request $request, $username,  $postId)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $user = Auth::user();

        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $postId,
            'user_id' => $user->id
        ]);

        return back();
    }
}
