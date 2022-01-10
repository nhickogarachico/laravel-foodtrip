<?php

namespace App\Http\Controllers\FriendRequest;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendRequestController extends Controller
{
    public function sendFriendRequest($userFirst, $userSecond)
    {
        $isFriend1 = UserRelationship::where('user_first_id', $userFirst)
            ->where('user_second_id', $userSecond);

        $isFriend2 = UserRelationship::where('user_first_id', $userSecond)
            ->where('user_second_id', $userFirst);

        if ($isFriend1->count() > 0 || $isFriend2->count() > 0) {
            return back();
        } else {
            UserRelationship::create([
                'user_first_id' => $userFirst,
                'user_second_id' => $userSecond,
            ]);
            return back();
        }
    }
    public function showFriendRequestView($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user || Auth::user() != $user) {
            return back();
        }

        // get all this user's friend requests
        $friendRequests = $user->requestTo;
        return view('screens.friend-requests', [
            'friendRequests' => $friendRequests
        ]);
    }
}
