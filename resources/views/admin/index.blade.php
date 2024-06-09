@extends('layouts.master')
@section('title')
    <title>CM | Admin</title>
@endsection
@section('content')
    <div class="admin-container">
        <div class="admin-cards">
            @foreach ($admin_cards as $admin_card)
                <div class="a-card">
                    <a href="{{route($admin_card->link)}}">
                        <div class="a-card-img">
                            <img src="{{asset($admin_card['route'])}}" alt="{{ $admin_card['title'] }}">
                        </div>
                        <div class="a-card-content">
                            <h2>{{ $admin_card['title'] }}</h2>
                            <p>{{ $admin_card['description'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection