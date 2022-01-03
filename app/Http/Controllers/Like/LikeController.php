<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\CommentLike;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost($postId)
    {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $postId
        ]);

        return back();
    }

    public function unlikePost($postId)
    {
        Like::where('post_id', $postId)->where('user_id', Auth::id())->delete();

        return back();
    }

    public function likeComment($commentId)
    {
        CommentLike::create([
            'user_id' => Auth::id(),
            'comment_id' => $commentId
        ]);

        return back();
    }

    public function unlikeComment($commentId)
    {
        CommentLike::where('comment_id', $commentId)->where('user_id', Auth::id())->delete();

        return back();
    }

}
