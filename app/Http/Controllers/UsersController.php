<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\User;

//use function Symfony\Component\String\b;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        $users_teacher = User::where('is_teacher', 'Teacher')->count();
        $users_student = User::where('is_teacher', 'Student')->count();
        return view('users.indexu', compact('users', 'users_teacher', 'users_student'));
    }

    public function create(){
        return view('users.createu');
    }

    public function store(Request $request)
    {
        /*return $request->all();*/

        $request->validate([
            'name'=> ['required'],
            'email'=> ['required'],
            'password'=> ['required'],
            'rfid'=> ['required'],
            'level'=> ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'rfid' => $request->rfid,
            'is_teacher' => $request->level,
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
            'rfid'=> ['required'],
            'level'=> ['required'],
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, /*FIXME - password should be hashed*/
            'rfid' => $request->rfid,
            'is_teacher' => $request->level,
        ]);

        //Session::flash('success-message', 'User updated successfully!');
        return redirect()->route('usersIndex');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        Session::flash('success-message', 'User deleted successfully!');
        return redirect()->route('usersIndex');
    }
}
