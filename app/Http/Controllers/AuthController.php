<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ //NOTE - This controller is done
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
            if (Auth::user()->role == 'Admin') {
                return redirect()->intended('admin')->withSuccess('Signed in');
            }
            return redirect()->intended('feed')->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Email is missing';
        $validator['password'] = 'Password is missing';
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
            'name' => 'required',
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

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
