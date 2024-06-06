@extends('layouts.master')
@section('title')
    <title>CM | Classes</title>
@endsection
@section('content')
<div class="container">
    <h1 class="green">Classes</h1>
    @foreach ($classes as $class)
        <div class="classes">
            <div class="class-info">
                <div class="class">{{$class->class_num}}</div>
                <div class="user">{{$class->teacher}}</div>
                <div class="type @if ($class->status == "Opened") active @endif">{{$class->status}}</div>
                <div class="time">{{$class->time}}</div>
                <div class="buttons">
                    <form action="{{route('classDelete', $class->id)}}" method="post">
                        @csrf
                        <button class="button delete-button"><img src="{{asset('assets/icons/delete.svg')}}" alt="Delete"></button> <!--TODO - pridat boostrap ikonky a prekliky-->
                    </form>
                    <form action="{{route('classEdit', $class->id)}}" method="get">
                        @csrf
                        <button class="button edit-button"><img src="{{asset('assets/icons/edit.svg')}}" alt="Edit"></button>     <!--NOTE - to iste ako vyssie -->
                    </form>
                </div>
            </div>
        </div>
    @endforeach
<div class="stats">
    <div class="stat">
        <p>Number of Classes: {{$classes_num}}</p>
    </div>
    <div class="stat">
        <p>Opened Classes: {{$classes_open}} </p>
    </div>
    <div class="stat">
        <p>Closed Classes: {{$classes_closed}} </p>
    </div>
</div>
<div class="acko">
    <a href="{{route('classCreate')}}">Create</a> <!--FIXME - nastylovat-->
</div>
@endsection