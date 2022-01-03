<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public $isLiked = false;
    public $likeCount = 0;
    public $commentCount = 0;

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
        $comments = $post->comments;

        //count like of this post
        $liked = Like::where('post_id', $post->id)->where('user_id', Auth::id())->count();
        $this->likeCount = $post->likes->count();

        if($liked > 0) {
            $this->isLiked = true;
        }

        // count number of comments
        $this->commentCount = $post->comments->count();

        return view('screens.post', [
            'user' => $user,
            'post' => $post,
            'comments' => $comments,
            'isLiked' => $this->isLiked,
            'likeCount' => $this->likeCount,
            'commentCount' => $this->commentCount
        ]);
    }
}
