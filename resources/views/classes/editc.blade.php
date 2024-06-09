@extends('layouts.master')
@section('title')
    <title>CM | Edit Class {{$class->class_num}}</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Edit Class</h1>
        <form action="{{route('classUpdate', $class->id)}}" method="POST">
          @csrf
          <input type="class" id="class_num" name="class_num" value="{{$class->class_num}}">
          @if($users_count > 0)
            <select name="teacher" id="teacher">
              @foreach($users as $user)
                <option value="{{$user->name}}" @if($class->teacher == $user->name) selected @endif>{{$user->name}}</option>
              @endforeach
            </select>
          @else
            <input type="teacher" id="teacher" name="teacher" value="{{$class->teacher}}">
          @endif
          </select>
          <div class="ram">
            @if($class->status == 'Opened')
            <div class="">
              <input type="radio" id="teacher" name="status" value="Opened" checked>
              <label for="teacher">Opened</label><br>
            </div>
            <div class="">
              <input type="radio" id="student" name="status" value="Closed">
              <label for="student">Closed</label><br>
            </div>
            @elseif($class->status == 'Closed')
            <div class="">
              <input type="radio" id="teacher" name="status" value="Opened">
              <label for="teacher">Opened</label><br>
            </div>
            <div class="">
              <input type="radio" id="student" name="status" value="Closed" checked>
              <label for="student">Closed</label><br>
            </div>
            @else
            <div class="">
              <input type="radio" id="teacher" name="status" value="Opened">
              <label for="teacher">Opened</label><br>
            </div>
            <div class="">
              <input type="radio" id="student" name="status" value="Closed">
              <label for="student">Closed</label><br>
            </div>
            @endif
          </div>
          <button type="submit" name="submit">Save</button>
        </form>
      </div>
@endsection