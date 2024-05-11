<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\User;

use function Symfony\Component\String\b;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.indexu', compact('users'));
    }

    public function create(){
        return redirect()->route('usersCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> ['required'],
            'email'=> ['required'],
            'password'=> ['required'],
            'personal_card'=> ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'personal_card' => $request->personal_card,
        ]);

        Session::flash('success-message', 'User created successfully!');
        return redirect()->route('usersIndex');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.editu', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> ['required'],
            'email'=> ['required'],
            'password'=> ['required'],
            'personal_card'=> ['required'],
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'personal_card' => $request->personal_card,
        ]);

        Session::flash('success-message', 'User updated successfully!');
        return redirect()->route('usersIndex');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        Session::flash('success-message', 'User deleted successfully!');
        return redirect()->route('usersIndex');
    }
}
