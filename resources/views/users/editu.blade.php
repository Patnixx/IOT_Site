@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Edit User</h1>
        <form action="{{route('usersUpdate', $user->id)}}" method="POST">
          @csrf
          <input type="name" id="name" name="name" value="{{$user->name}}">
          <input type="email" id="email" name="email" value="{{$user->email}}">
          <input type="password" id="password" name="password" value="{{$user->password}}">
          <input type="rfid" id="rfid" name="rfid" value="{{$user->rfid}}">
          <div class="ram">
            <input type="radio" id="teacher" name="level" value="Teacher">
            <label for="teacher">Teacher</label><br>
            <input type="radio" id="student" name="level" value="Student">
            <label for="student">Student</label><br>
          </div>
          <button type="submit">Save</button>
        </form>
      </div>
@endsection