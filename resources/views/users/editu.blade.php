@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Edit User</h1>
        <form>
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
          <button type="submit">Save</button>
        </form>
      </div>
@endsection