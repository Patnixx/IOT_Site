@extends('layouts.master')
@section('title')
    <title>CM | Create Class</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Create Class</h1>
        <form action="{{route('classStore')}}" method="POST">
          @csrf
          <input type="class" id="class_num" name="class_num" placeholder="Class Number">
          @if($users_count > 0)
            <select name="teacher" id="teacher">
              <option selected>Select a Teacher</option>
              @foreach($users as $user)
                <option value="{{$user->name}}">{{$user->name}}</option>
              @endforeach
            </select>
          @else
            <input type="teacher" id="teacher" name="teacher" value="{{$class->teacher}}">
          @endif
          <div class="ram">
            <div class="">
              <input type="radio" id="opened" name="status" value="Opened">
              <label for="opened">Opened</label><br>
            </div>
            <div class="">
              <input type="radio" id="closed" name="status" value="Closed">
              <label for="closed">Closed</label><br>
            </div>
          </div>
          <button type="submit" name="submit">Create</button>
        </form>
      </div>
@endsection