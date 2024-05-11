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
        return redirect()->route('classCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_num' => ['required'],
            'teacher'=> ['required'],
        ]);

        Classroom::create([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
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
        $request->validate([
            'class_num' => ['required'],
            'teacher'=> ['required'],
        ]);

        Classroom::where('id', $id)->update([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
        ]);

        Session::flash('success-message', 'Class updated successfully!');
        return redirect()->route('classIndex');
    }

    public function delete($id)
    {
        Classroom::where('id', $id)->delete();
        Session::flash('success-message', 'Class deleted successfully!');
        return redirect()->route('classIndex');
    }
}
