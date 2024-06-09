@extends('layouts.master')
@section('title')
    <title>CM | Edit User {{$user->name}}</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Edit User</h1>
        <form action="{{route('usersUpdate', $user->id)}}" method="POST">
          @csrf
          <input type="name" id="name" name="name" value="{{$user->name}}">
          <input type="email" id="email" name="email" value="{{$user->email}}">
          <input type="rfid" id="rfid" name="rfid" value="{{$user->rfid}}">
          <div class="ram">
              <div class="teacher">
                <input type="radio" id="teacher" name="level" value="Teacher" @if($user->role == 'Teacher') checked @endif>
                <label for="teacher">Teacher</label><br>
              </div>
              <div class="student">
                <input type="radio" id="student" name="level" value="Student" @if ($user->role == 'Student') checked @endif>
                <label for="student">Student</label><br>
              </div>
              <div class="user">
                <input type="radio" id="user" name="level" value="User" @if ($user->role == 'User') checked @endif>
                <label for="user">User</label><br>
              </div>
              <div class="admin">
                <input type="radio" id="admin" name="level" value="Admin" @if ($user->role == 'Admin') checked @endif>
                <label for="admin">Admin</label><br>
              </div>
          </div>
          <button type="submit">Save</button>
        </form>
      </div>
@endsection