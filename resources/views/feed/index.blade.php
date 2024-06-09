

@extends('layouts.master')
@section('title')
    <title>CM | Feed</title>
@endsection
@section('content')
<h1 class="green">Feed</h1>
    <div class="feed-container">
      @foreach ($feeds as $feed)
        <div class="scroll">
          <div class="super">
            <img src="@if($feed->user->role == "Teacher"){{asset('assets/icons/teacher.png')}} @elseif($feed->user->role == "Student"){{asset('assets/icons/student.png')}}@endif">
            <div class="feed-item">
              <div class="time-header">
                <h2>{{$feed->user->name}}</h2>
                <h2>{{$feed->class_num}}</h2>
                <span class="time">{{$feed->time}}</span>
              </div>
              <div class="content">Classroom {{$feed->class_num}} was interacted by the {{$feed->user->role}} {{$feed->user->name}}.</div>
            </div>
          </div>
        </div>
      @endforeach
@endsection