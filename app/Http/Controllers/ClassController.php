<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassController extends Controller
{
    public function index() {
        $classes = Classroom::all();
        return view('classes.indexc', compact('classes'));
    }

    public function create()
    {
        return view('classes.createc');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_num' => ['required'],
            'teacher'=> ['required'],
            //'status' => ['required'], //TODO - send radio button value
        ]);

        Classroom::create([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
            'status' => "open",           //TODO - change to dynamic
        ]);

        Session::flash('success-message', 'Class created successfully!');
        return redirect()->route('classIndex');
    }

    public function edit($id)
    {
        $class = Classroom::find($id);
        return view('classes.editc', compact('class'));
    }

    public function update(Request $request, $id)
    {
        /*$request->validate([
            'class' => ['required'],
            'teacher'=> ['required'],
        ]); */

        Classroom::where('id', $id)->update([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
            'status' => $request->status,
        ]);

        //Session::flash('success-message', 'Class updated successfully!');
        return redirect()->route('classIndex');
    }

    public function delete($id)
    {
        Classroom::where('id', $id)->delete();
        Session::flash('success-message', 'Class deleted successfully!');
        return redirect()->route('classIndex');
    }
}
