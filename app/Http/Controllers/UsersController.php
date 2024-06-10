<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//use function Symfony\Component\String\b;

class UsersController extends Controller
{ //NOTE - This controller is done
    public function index(){

        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $users = User::all();
                $users_teacher = User::where('role', 'Teacher')->count();
                $users_student = User::where('role', 'Student')->count();
                $users_admin = User::where('role', 'Admin')->count();
                $users_user = User::where('role', 'User')->count();
                return view('users.indexu', compact('users', 'users_teacher', 'users_student', 'users_admin', 'users_user'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function create(){
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $cards = Card::whereNull('owner_id')->get();
                $cards_count = Card::whereNull('owner_id')->count();
                return view('users.createu', compact('cards', 'cards_count'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $request){
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $request->validate([
                'name'=> ['required'],
                'email'=> ['required'],
                'password'=> ['required'],
                //'rfid'=> ['required'],
                'level'=> ['required'],
                ]);

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'rfid' => $request->rfid,
                    'role' => $request->level,
                ]);

                Card::where('rfid', $request->rfid)->update([
                    'owner_id' => User::where('rfid', $request->rfid)->first()->id,
                ]);

                Session::flash('success-message', 'User created successfully!');
                return redirect()->route('usersIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function edit($id){
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $user = User::find($id);
                $cards = Card::whereNull('owner_id')->get();
                $cards_count = Card::whereNull('owner_id')->count();
                return view('users.editu', compact('user', 'cards', 'cards_count'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function update(Request $request, $id)
    {

        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $request->validate([
                    'name'=> ['required'],
                    'email'=> ['required'],
                    'rfid'=> ['required'],
                    'level'=> ['required'],
                ]);

                User::where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'rfid' => $request->rfid,
                    'role' => $request->level,
                ]);

                Card::where('owner_id', $id)->update([
                    'owner_id' => null,
                ]);

                Card::where('rfid', $request->rfid)->update([
                    'owner_id' => $id,
                ]);

                Session::flash('success-message', 'User updated successfully!');
                return redirect()->route('usersIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function delete($id)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                User::where('id', $id)->delete();
                Card::where('owner_id', $id)->update([
                    'owner_id' => null,
                ]);
                Session::flash('success-message', 'User deleted successfully!');
                return redirect()->route('usersIndex');
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
