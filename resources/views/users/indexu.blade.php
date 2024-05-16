@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Users</h1>
    @for($i = 0; $i < 3; $i++)
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
    @endfor
</div>
<div class="stats">
    <div class="stat">
        <p>Number of Teachers: X </p>
    </div>
    <div class="stat">
        <p>Number of Students: X </p>
    </div>
</div>
<div class="buttons">
    <button class="button create-button">Create User</button> //FIXME - nastylovat
</div>
@endsection