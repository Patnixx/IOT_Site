@extends('layouts.master')
@section('title')
    <title>CM | Edit @if($card->user->role == "Teacher")Card @elseif($card->user->role == "Student")Chip @endif {{$card->rfid}}</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Edit @if($card->user->role == "Teacher")Card @elseif($card->user->role == "Student")Chip @endif</h1>
        <form action="{{route('cardsUpdate', $card->id)}}" method="POST">
          @csrf
          <input type="class" id="rfid" name="rfid" value="{{$card->rfid}}">
          <input type="teacher" id="owner" name="owner" value="{{$card->user->name}}">
          <button type="submit" name="submit">Save</button>
        </form>
      </div>
@endsection