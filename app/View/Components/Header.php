<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $notificationsCount = Auth::user()->unreadNotifications->count();
            return view('components.header', [
                'user' => $user,
                'notificationsCount' => $notificationsCount
            ]);
        } else 
        {
            return view('components.header');
        }
    }
}
