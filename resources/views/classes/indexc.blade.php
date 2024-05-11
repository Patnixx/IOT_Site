@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Classes</h1>
    <div class="classes">
       <div class="class-info">
         <div class="class">404</div>
         <div class="user">Paní Ing. Lenka Vnuková</div>
         <div class="type active">Open</div>
         <div class="time">23:59</div>
         <div class="buttons">
           <button class="button delete-button">Delete</button>
           <button class="button edit-button">Edit</button>
         </div>
       </div>
    </div>
    <div class="classes">
       <div class="class-info">
         <div class="class">402</div>
         <div class="user">Paní Ing. Lenka Vnuková</div>
         <div class="type">Closed</div>
         <div class="time">23:59</div>
         <div class="buttons">
           <button class="button delete-button">Delete</button>
           <button class="button edit-button">Edit</button>
         </div>
       </div>
    </div>
    <div class="classes">
        <div class="class-info">
            <div class="class">406</div>
            <div class="user">Paní Ing. Lenka Vnuková</div>
            <div class="type">Closed</div>
            <div class="time">23:59</div>
            <div class="buttons">
                <button class="button delete-button">Delete</button>
                <button class="button edit-button">Edit</button>
            </div>
        </div>
    </div>
</div>
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
    <button class="button create-button">Create</button>
</div>
@endsection