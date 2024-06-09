<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{ //NOTE - This controller is done
    public function index() {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $classes = Classroom::all();
                $classes_num = Classroom::all()->count();
                $classes_open = Classroom::where('status', 'opened')->count();
                $classes_closed = Classroom::where('status', 'closed')->count();
                return view('classes.indexc', compact('classes', 'classes_num', 'classes_open', 'classes_closed'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function create()
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $users = User::where('role', 'Teacher')->get();
                $users_count = User::where('role', 'Teacher')->count();
                return view('classes.createc', compact('users','users_count'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $request->validate([
                    'class_num' => ['required'],
                    'teacher'=> ['required'],
                    'status' => ['required'],
                ]);
                
                $user = User::where('name', $request->teacher)->get();
        
                Classroom::create([
                    'class_num' => $request->class_num,
                    'teacher' => $user[0]->name,
                    'status' => $request->status,
                    'time' => now()->format('H:i:s'),
                ]);
        
                Feed::create([
                    'class_num' => $request->class_num,
                    'user_id' => $user[0]->id,
                    'time' => now()->format('H:i:s'),
                ]);
        
                Session::flash('success-message', 'Class created successfully!');
                return redirect()->route('classIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function edit($id)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $class = Classroom::find($id);
                $users = User::where('role', 'Teacher')->get();
                $users_count = User::where('role', 'Teacher')->count();
                return view('classes.editc', compact('class', 'users', 'users_count'));
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
                    'class_num' => ['required'],
                    'teacher'=> ['required'],
                    'status' => ['required'],
                ]);
                
                $user = User::where('name', $request->teacher)->get();                
        
                Classroom::where('id', $id)->update([
                    'class_num' => $request->class_num,
                    'teacher' => $user[0]->name,
                    'status' => $request->status,
                    'time' => now()->format('H:i:s'),
                ]);
        
                
        
                Feed::create([
                    'class_num' => $request->class_num,
                    'user_id' => $user[0]->id,
                    'time' => now()->format('H:i:s'),
                ]);
        
                Session::flash('success-message', 'Class updated successfully!');
                return redirect()->route('classIndex');
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
                Classroom::where('id', $id)->delete();
                Session::flash('success-message', 'Class deleted successfully!');
                return redirect()->route('classIndex');
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
