@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Edit Class</h1>
        <form action="{{route('classUpdate', $class->id)}}" method="POST">
          @csrf
          <input type="class" id="class_num" name="class_num" value="{{$class->class_num}}">
          <input type="teacher" id="teacher" name="teacher" value="{{$class->teacher}}">
          <input type="status" id="status" name="status" value="{{$class->status}}">
          <button type="submit" name="submit">Save</button>
        </form>
      </div>
@endsection