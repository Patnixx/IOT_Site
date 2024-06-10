@extends('layouts.master')
@section('title')
    <title>CM | Create Card</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Create Card</h1>
        <form action="{{route('cardsStore')}}" method="POST">
          @csrf
          <input type="class" id="rfid" name="rfid" placeholder="RFID">
          @if($users_count > 0)
            <select name="owner" id="owner">
                @foreach($users as $user)
                  <option value="{{$user->name}}">{{$user->name}} ({{$user->role}})</option>
                @endforeach
            </select>
          @else
            <p>No Users Avaiable</p>
          @endif
          <div class="ram">
            <div class="">
              <input type="radio" id="card" name="status" value="Card">
              <label for="card">Card</label><br>
            </div>
            <div class="">
              <input type="radio" id="chip" name="status" value="Chip">
              <label for="chip">Chip</label><br>
            </div>
          </div>
          <button type="submit" name="submit">Create</button>
        </form>
      </div>
@endsection