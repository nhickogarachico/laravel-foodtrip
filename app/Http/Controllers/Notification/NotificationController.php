<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function showNotificationsView($username)
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('screens.notifications');
    }

    public function fetchNotificationsJSON($username)
    {
        $notifications = Auth::user()->notifications;
        return response()->json([
            'notifications' => $notifications
        ]);
    }

    public function fetchUnreadNotificationsCount($username)
    {
        $notificationsCount = Auth::user()->unreadNotifications->count();
        return response()->json([
            'notificationsCount' => $notificationsCount
        ]);
    }

    public function deleteAllNotifications($username)
    {
        $user = User::where('username', $username)->first();
        if($user == Auth::user())
        {   
            $user->notifications()->delete();
            return response()->json([
                'message' => 'Notifications deleted successfully'
            ]);
        } 
        return back();
    }
}
