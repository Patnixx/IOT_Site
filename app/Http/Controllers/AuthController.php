<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('feed')->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Email address or password is incorrect';
        return redirect('login')->withErrors($validator);

    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function registerAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('feed')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }

    public function feed()
    {
        if(Auth::check()){
            return view('feed.index');
        }

        return redirect('login')->withSuccess('You are not allowed to access');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
