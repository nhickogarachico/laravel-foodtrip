<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{

    public $isLiked = false;
    public $likeCount = 0;
    public $commentCount = 0;

    public function addNewPost(Request $request)
    {
        $userId = Auth::id();

        if(!$request->input('content') && !$request->file('postImage'))
        {
            $request->validate([
                'content' => 'required',
                'postImage' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);
        }
        


        $post = Post::create([
            'content' => $request->input('content'),
            'user_id' => $userId,
        ]);

        // postImage
        if ($request->file('postImage')) {
            //check if directory exists
            $postImagesDirectory = 'images/database/' . $userId . '/post_images';

            if (!File::exists($postImagesDirectory)) {
                File::makeDirectory($postImagesDirectory, 0777, true);
            }

            $postImageName = time() . $post->id . '.' . $request->file('postImage')->extension();
            $postImagePath = "/" . $postImagesDirectory . "/" . $postImageName;

            $request->file('postImage')->move(public_path($postImagesDirectory), $postImagePath);

            $post->image = $postImagePath;
            $post->save();

        }
        

        // post notification
        //get user friends
        $friends = Auth::user()->friends;
        Notification::send($friends, new NewPostNotification(Auth::user(), $post));
        
        return back()->with([
            'success' => 'Added new post succesfully'
        ]);
    }

    public function showPostView($username, $postId)
    {
        $post = Post::where('id', $postId)->first();

        if(!$post)
        {
            return back();
        }

        $user = $post->user;
        $comments = $post->comments;

        //count like of this post
        $liked = Like::where('post_id', $post->id)->where('user_id', Auth::id())->count();
        $this->likeCount = $post->likes->count();

        if ($liked > 0) {
            $this->isLiked = true;
        }

        // count number of comments
        $this->commentCount = $post->allComments->count();

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
