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
          <input type="teacher" id="owner" name="owner" placeholder="Owner">
          <button type="submit" name="submit">Create</button>
        </form>
      </div>
@endsection