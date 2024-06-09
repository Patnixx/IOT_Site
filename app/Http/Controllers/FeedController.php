<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feed;
use App\Models\User;

class FeedController extends Controller
{ //NOTE - This controller is done
    public function feed(){
        if(Auth::check()){
            if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher' || Auth::user()->role == 'Student'){
            $feeds = Feed::whereHas('user', function($query) {
                $query->whereIn('role', ['Teacher', 'Student']);
            })
            ->with(['user'])
            ->orderBy('time', 'desc')
            ->take(3)
            ->get();
            return view('feed.index', compact('feeds'));
            }

            elseif(Auth::user()->role == 'User'){
                return view('errors.403');
            }
        }
        return redirect('login')->withSuccess('You are not allowed to access');
    }
}
