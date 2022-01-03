<?php

namespace App\View\Components;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class PostComponent extends Component
{
    public $post;
    public $isLiked = false;
    public $likeCount = 0;
    public $commentCount = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       

        $liked = Like::where('post_id', $this->post->id)->where('user_id', Auth::id())->count();
        
        //get number of likes
        $this->likeCount = $this->post->likes->count();

        //get number of comments
        $this->commentCount = $this->post->comments->count();

        if($liked > 0) {
            $this->isLiked = true;
        }

        return view('components.post-component');
    }
}
