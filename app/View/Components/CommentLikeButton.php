<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentLikeButton extends Component
{

    public $commentId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-like-button');
    }
}
