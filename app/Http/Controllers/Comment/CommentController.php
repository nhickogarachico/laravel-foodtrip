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

    public function replyToComment(Request $request, $commentId)
    {

        $request->validate([
            "content$commentId" => 'required'
        ]);
        
        $comment = Comment::where('id', $commentId)->first();
        $postId = $comment->post->id;
        $userId = Auth::id();

        Comment::create([
            'content' => $request->input("content$commentId"),
            'post_id' => $postId,
            'user_id' => $userId,
            'reply_id' => $commentId
        ]);

        return back();

    }
}
