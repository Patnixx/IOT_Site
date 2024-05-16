@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="green">Classes</h1>
    @for ($i = 0; $i < 3; $i++)
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
    @endfor
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
    <button class="button create-button">Create</button> //FIXME - nastylovat
</div>
@endsection