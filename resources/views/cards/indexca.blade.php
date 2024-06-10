@extends('layouts.master')
@section('title')
    <title>CM | Cards</title>
@endsection
@section('content')
<div class="container">
    <h1 class="green">@if($cardsAll->count() > 0) Active RFID @else Inactive RFID @endif</h1>
    @foreach ($cardsAll as $card)
            <div class="classes">
                <div class="class-info">
                    <div class="class">{{$card->rfid}}</div>
                    <div class="user">@if($card->owner_id == null) @else {{$card->user->name}} @endif</div>
                    <div class="type">{{$card->type}}</div>
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