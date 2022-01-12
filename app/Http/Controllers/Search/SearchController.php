<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function searchUser(Request $request)
    {
        $search = $request->input('search');

        $request->validate([
            'search' => 'required'
        ]);

        $users = User::where('username', 'LIKE', "%{$search}%")
        ->orWhere('first_name', 'LIKE', "%{$search}%")
        ->orWhere('last_name', 'LIKE', "%{$search}%")
        ->get();

        return view('screens.search-result', [
            'users' => $users,
            'search' => $search,
            'friendsId' => array_column(Auth::user()->friends->toArray(), 'id')
        ]);
    }
}
