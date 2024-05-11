@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Users</h1>
    <div class="classes">
       <div class="class-info">
         <div class="user">Paní Ing. Lenka Vnuková</div>
         <div class="level">Teacher</div>
         <div class="RFID">48:B2:3A</div>
         <div class="buttons">
           <button class="button delete-button">Delete</button>
           <button class="button edit-button">Edit</button>
         </div>
       </div>
    </div>
    <div class="classes">
       <div class="class-info">
         <div class="user">Patrik Nemčok</div>
         <div class="level">Student</div>
         <div class="RFID">28:A7:5D</div>
         <div class="buttons">
           <button class="button delete-button">Delete</button>
           <button class="button edit-button">Edit</button>
         </div>
       </div>
    </div>
    <div class="classes">
        <div class="class-info">
            <div class="user">Stanislav Chabreček</div>
            <div class="level">Student</div>
         <div class="RFID">A69:420:13B</div>
            <div class="buttons">
                <button class="button delete-button">Delete</button>
                <button class="button edit-button">Edit</button>
            </div>
        </div>
    </div>
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
    <button class="button create-button">Create User</button>
</div>
@endsection