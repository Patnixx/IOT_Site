@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Users</h1>
    {{--@for($i = 0; $i < 3; $i++)
    <div class="classes">
       <div class="class-info">
         <div class="user">Paní Ing. Lenka Vnuková</div>
         <div class="level">Teacher</div>
         <div class="RFID">48:B2:3A</div>
         <div class="buttons">
           <button class="button delete-button">Delete</button> //TODO - pridat boostrap ikonky a prekliky
           <button class="button edit-button">Edit</button>     //NOTE - to iste ako vyssie
         </div>
       </div>
    </div>
    @endfor--}}
    @foreach ($users as $user)
        <div class="classes">
            <div class="class-info">
                <div class="user">{{$user->name}}</div>
                <div class="level">{{$user->is_teacher}}</div>
                <div class="RFID">{{$user->rfid}}</div>
                <div class="buttons">
                    <form action="{{route('usersDelete', $user->id)}}" method="POST">
                        @csrf
                        <button class="button delete-button">Delete</button><!--TODO - pridat boostrap ikonky a prekliky -->
                    </form>
                    <form action="{{route('usersEdit', $user->id)}}" method="get">
                        @csrf
                        <button class="button edit-button">Edit</button>     <!--NOTE - to iste ako vyssie -->
                    </form> 
                  </div>
            </div>
        </div>
    @endforeach
</div>
<div class="stats">
    <div class="stat">
        <p>Number of Teachers: X </p>
    </div>
    <div class="stat">
        <p>Number of Students: X </p>
    </div>
</div>
<div class="acko">
    <a href="{{route('usersCreate')}}">Create User</a> <!--FIXME - nastylovat -->
</div>
@endsection