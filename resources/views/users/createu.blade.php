@extends('layouts.master')
@section('title')
    <title>CM | Create User</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Register User</h1>
        <form action="{{ route('usersStore')}}" method="POST">
          @csrf
          <input type="name" id="name" name="name" placeholder="Name">
          <input type="email" id="email" name="email" placeholder="Email">
          <input type="password" id="password" name="password" placeholder="Password" minlength="6">
          @if($cards_count > 0)
            <select name="rfid" id="rfid">
              @foreach($cards as $card)
                <option value="{{$card->rfid}}">{{$card->rfid}}</option>
              @endforeach
            </select>
          @else
            <p>No Cards Avaiable</p>
          @endif
          <div class="ram">
            <div class="">
              <input type="radio" id="teacher" name="level" value="Teacher">
              <label for="teacher">Teacher</label><br>
            </div>
            <div class="">
              <input type="radio" id="student" name="level" value="Student">
              <label for="student">Student</label><br>
            </div>
          </div>
          <button type="submit">Register</button>
        </form>
      </div>
@endsection