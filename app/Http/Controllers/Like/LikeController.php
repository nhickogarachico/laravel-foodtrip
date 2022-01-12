<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use App\Notifications\PostLikedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{
    public function likePost($postId)
    {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $postId
        ]);

        // get user of post
        $post = Post::where('id', $postId)->first();
        $userToNotify = $post->user;

        //send notification
        if (Auth::user() != $userToNotify) {
            Notification::send($userToNotify, new PostLikedNotification(Auth::user(), $post));
        }

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
