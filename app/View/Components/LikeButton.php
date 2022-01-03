<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LikeButton extends Component
{

    public $postId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postId)
    {
        $this->postId = $postId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.like-button');
    }
}
