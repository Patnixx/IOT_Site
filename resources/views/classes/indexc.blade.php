@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Classes</h1>
    {{--@for ($i = 0; $i < 3; $i++)
        <div class="classes">
            <div class="class-info">
            <div class="class">404</div>
            <div class="user">Paní Ing. Lenka Vnuková</div>
            <div class="type active">Open</div>
            <div class="time">23:59</div>
            <div class="buttons">
                <button class="button delete-button">Delete</button> //TODO - pridat boostrap ikonky a prekliky
                <button class="button edit-button">Edit</button>     //NOTE - to iste ako vyssie 
            </div>
            </div>
        </div>
    @endfor--}}
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
                        <button class="button delete-button">Delete</button> <!--TODO - pridat boostrap ikonky a prekliky-->
                    </form>
                    <form action="{{route('classEdit', $class->id)}}" method="get">
                        @csrf
                        <button class="button edit-button">Edit</button>     <!--NOTE - to iste ako vyssie -->
                    </form>
                </div>
            </div>
        </div>
    @endforeach
<div class="stats">
    <div class="stat">
        <p>Number of Classes: X </p>
    </div>
    <div class="stat">
        <p>Opened Classes: X </p>
    </div>
    <div class="stat">
        <p>Closed Classes: X </p>
    </div>
</div>
<div class="buttons">
    <a href="{{route('classCreate')}}" class="button create-button">Create</a> <!--FIXME - nastylovat-->
</div>
@endsection