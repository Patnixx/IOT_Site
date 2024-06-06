<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;

class FeedController extends Controller
{
    //
    public function feed()
    {
        if(Auth::check()){
            $classes = Classroom::orderBy('updated_at', 'desc')->get();
            return view('feed.index', compact('classes'));
        }

        return redirect('login')->withSuccess('You are not allowed to access');
    }
}
