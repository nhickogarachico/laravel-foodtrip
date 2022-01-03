<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddFriendButton extends Component
{

    public $userSecond;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userSecond)
    {
        $this->userSecond = $userSecond;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-friend-button');
    }
}
