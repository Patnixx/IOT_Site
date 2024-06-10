@extends('layouts.master')
@section('title')
    <title>CM | Edit {{$card->type}}</title>
@endsection
@section('content')
<div class="register-container">
        <h1 class="green">Edit {{$card->type}}</h1>
        <form action="{{route('cardsUpdate', $card->id)}}" method="POST">
          @csrf
          <input type="class" id="rfid" name="rfid" value="{{$card->rfid}}">
          @if($users_count > 0)
            <select name="owner" id="owner">
                @foreach($users as $user)
                  <option value="{{$user->name}}" @if($card->owner_id == $user->id) selected @endif>{{$user->name}} ({{$user->role}})</option>
                @endforeach
            </select>
          @else
            <p>No Users Avaiable</p>
          @endif
          
          {{--<input type="teacher" id="owner" name="owner" value="@if($card->owner_id == null) Missing... @else {{$card->user->name}} @endif">
          --}}<button type="submit" name="submit">Save</button>
        </form>
      </div>
@endsection