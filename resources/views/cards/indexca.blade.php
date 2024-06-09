@extends('layouts.master')
@section('title')
    <title>CM | Cards</title>
@endsection
@section('content')
<div class="container">
    <h1 class="green">Cards</h1>
    @foreach ($cards as $card)
        <div class="classes">
            <div class="class-info">
                <div class="class">{{$card->rfid}}</div>
                <div class="user">{{$card->user->name}}</div>
                <div class="type @if ($card->user->role == "Teacher") active @endif">@if($card->user->role == "Teacher")Card @elseif($card->user->role == "Student")Chip @endif</div>
                <div class="buttons">
                    <form action="{{route('cardsDelete', $card->id)}}" method="post">
                        @csrf
                        <button class="button delete-button"><img src="{{asset('assets/icons/delete.svg')}}" alt="Delete"></button> <!--TODO - pridat boostrap ikonky a prekliky-->
                    </form>
                    <form action="{{route('cardsEdit', $card->id)}}" method="get">
                        @csrf
                        <button class="button edit-button"><img src="{{asset('assets/icons/edit.svg')}}" alt="Edit"></button>     <!--NOTE - to iste ako vyssie -->
                    </form>
                </div>
            </div>
        </div>
    @endforeach
<div class="stats">
    <div class="stat">
        <p>Number of Cards: {{$cards_card}}</p>
    </div>
    <div class="stat">
        <p>Number of Chips: {{$cards_chip}} </p>
    </div>
</div>
<div class="acko">
    <a href="{{route('cardsCreate')}}">Create</a> <!--FIXME - nastylovat-->
</div>
@endsection