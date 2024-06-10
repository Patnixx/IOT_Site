<?php

namespace App\Http\Controllers;

use App\Models\AdminCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{ //NOTE - This controller is done
    public function index()
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $name = Auth::user()->name;
                $admin_cards = AdminCard::all();
                return view('admin.index', compact('admin_cards', 'name'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }
}
