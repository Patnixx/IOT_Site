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
            'class' => ['required'],
            'teacher'=> ['required'],
        ]);

        Classroom::create([
            'class' => $request->class,
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
            'class' => ['required'],
            'teacher'=> ['required'],
        ]);

        Classroom::where('id', $id)->update([
            'class' => $request->class,
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
