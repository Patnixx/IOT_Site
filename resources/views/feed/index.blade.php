@extends('layouts.master')
@section('content')
<h1 class="green">Feed</h1>
    <div class="feed-container">
      {{--@for ($i = 0; $i < 7; $i++)
        <div class="super">
          <img src="{{asset('assets/img/vuvu.jpg')}}">
          <div class="feed-item">
            <div class="time-header">
              <h2>Header</h2>
              <span class="time">8m ago</span>
            </div>
            <div class="content">He'll want to use your yacht, and I don't want this thing smelling like fish.</div>
          </div>
        </div>
      @endfor--}}
      @foreach ($classes as $class)
        <div class="super">
          <img src="{{asset('assets/img/vuvu.jpg')}}">
          <div class="feed-item">
            <div class="time-header">
              <h2>{{$class->teacher}}</h2>
              <h2>{{$class->class_num}}</h2>
              <span class="time">{{$class->updated_at}}</span>
            </div>
            <div class="content">Classroom {{$class->class_num}} was {{$class->status}} by the teacher {{$class->teacher}}.</div>
          </div>
        </div>
      @endforeach
@endsection