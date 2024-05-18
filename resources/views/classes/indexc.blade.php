@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Classes</h1>
    @foreach ($classes as $class)
        <div class="classes">
            <div class="class-info">
                <div class="class">{{$class->class_num}}</div>
                <div class="user">{{$class->teacher}}</div>
                <div class="type active">{{$class->status}}</div>
                <div class="time">{{$class->updated_at}}</div>
                <div class="buttons">
                    <form action="{{route('classDelete', $class->id)}}" method="post">
                        @csrf
                        <button class="button delete-button">Delete<!--<i class="bi bi-trash"></i>--></button> <!--TODO - pridat boostrap ikonky a prekliky-->
                    </form>
                    <form action="{{route('classEdit', $class->id)}}" method="get">
                        @csrf
                        <button class="button edit-button">Edit<!--<i class="bi bi-pencil"></i>--></button>     <!--NOTE - to iste ako vyssie -->
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