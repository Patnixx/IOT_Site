<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feed;

class FeedController extends Controller
{
    //
    public function feed()
    {
        if(Auth::check()){
            $feeds = Feed::orderBy('time', 'desc')->get();
            return view('feed.index', compact('feeds'));
        }

        return redirect('login')->withSuccess('You are not allowed to access');
    }
}
