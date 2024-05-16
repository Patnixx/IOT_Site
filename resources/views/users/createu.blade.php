@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Register User</h1>
        <form action="{{ route('usersStore')}}" method="POST">
          @csrf
          <input type="name" id="name" name="name" placeholder="Name">
          <input type="email" id="email" name="email" placeholder="Email">
          <input type="password" id="password" name="password" placeholder="Password">
          <input type="rfid" id="rfid" name="rfid" placeholder="RFID">
          <div class="ram">
            <input type="radio" id="teacher" name="level" value="Teacher">
            <label for="teacher">Teacher</label><br>
            <input type="radio" id="student" name="level" value="Student">
            <label for="student">Student</label><br>
          </div>
          <button type="submit">Register</button>
        </form>
      </div>
@endsection