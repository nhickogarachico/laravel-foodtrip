<?php

namespace App\View\Components;

use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Comment extends Component
{

    public $comment;
    public $likeCount = 0;
    public $isLiked = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $liked = CommentLike::where('comment_id', $this->comment->id)->where('user_id', Auth::id())->count();
        
        //get number of likes
        $this->likeCount = $this->comment->commentLikes->count();

        if($liked > 0) {
            $this->isLiked = true;
        }

        return view('components.comment');
    }
}
