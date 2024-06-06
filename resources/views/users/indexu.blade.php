@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Users</h1>
    @foreach ($users as $user)
        <div class="classes">
            <div class="class-info">
                <div class="user">{{$user->name}}</div>
                <div class="level">{{$user->role}}</div>
                <div class="RFID">{{$user->rfid}}</div>
                <div class="buttons">
                    <form action="{{route('usersDelete', $user->id)}}" method="POST">
                        @csrf
                        <button class="button delete-button"><img src="{{asset('assets/icons/delete.svg')}}" alt="Delete"></button><!--TODO - pridat boostrap ikonky -->
                    </form>
                    <form action="{{route('usersEdit', $user->id)}}" method="get">
                        @csrf
                        <button class="button edit-button"><img src="{{asset('assets/icons/edit.svg')}}" alt="Edit"></button>     <!--NOTE - to iste ako vyssie -->
                    </form> 
                  </div>
            </div>
        </div>
    @endforeach
</div>
<div class="stats">
    <div class="stat">
        <p>Number of Teachers: {{$users_teacher}} </p>
    </div>
    <div class="stat">
        <p>Number of Students: {{$users_student}} </p>
    </div>
</div>
<div class="acko">
    <a href="{{route('usersCreate')}}">Create User</a>
</div>
@endsection