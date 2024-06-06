<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Feed;
class ClassController extends Controller
{
    public function index() {
        $classes = Classroom::all();
        $classes_num = Classroom::all()->count();
        $classes_open = Classroom::where('status', 'opened')->count();
        $classes_closed = Classroom::where('status', 'closed')->count();
        return view('classes.indexc', compact('classes', 'classes_num', 'classes_open', 'classes_closed'));
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
            'status' => ['required'],
        ]);

        Classroom::create([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
            'status' => $request->status,
            'time' => now()->format('H:i:s'),
        ]);

        Feed::create([
            'class_num' => $request->class_num,
            'user' => $request->teacher,
            'time' => now()->format('H:i:s'),
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
            'status' => ['required'],
        ]);

        Classroom::where('id', $id)->update([
            'class_num' => $request->class_num,
            'teacher' => $request->teacher,
            'status' => $request->status,
            'time' => now()->format('H:i:s'),
        ]);

        Feed::create([
            'class_num' => $request->class_num,
            'user' => $request->teacher,
            'time' => now()->format('H:i:s'),
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
