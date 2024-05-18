@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Edit Class</h1>
        <form action="{{route('classUpdate', $class->id)}}" method="POST">
          @csrf
          <input type="class" id="class_num" name="class_num" value="{{$class->class_num}}">
          <input type="teacher" id="teacher" name="teacher" value="{{$class->teacher}}">
          <div class="ram">
            @if($class->status == 'Opened')
              <input type="radio" id="teacher" name="status" value="Opened" checked>
              <label for="teacher">Opened</label><br>
              <input type="radio" id="student" name="status" value="Closed">
              <label for="student">Closed</label><br>   
            @elseif($class->status == 'Closed')
              <input type="radio" id="teacher" name="status" value="Opened">
              <label for="teacher">Opened</label><br>
              <input type="radio" id="student" name="status" value="Closed" checked>
              <label for="student">Closed</label><br>
            @else
              <input type="radio" id="teacher" name="status" value="Opened">
              <label for="teacher">Opened</label><br>
              <input type="radio" id="student" name="status" value="Closed">
              <label for="student">Closed</label><br>
            @endif
          </div>
          <button type="submit" name="submit">Save</button>
        </form>
      </div>
@endsection