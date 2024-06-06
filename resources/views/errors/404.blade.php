@extends('layouts.error')
@section('logo')
    <img src="{{asset('assets/icons/404_not_found.svg')}}" alt="logo">
@endsection
@section('content')
    <div class="error-content">
        <h1 class="error-num">Error 404</h1>
        <h2 class="error-subtitle">Page does not exist</h2>
        <p class="error-desc">You drifted off! This website does not exist. If you think it should, contact this site's <strong><a href="https://github.com/Patnixx" target="_blank">admin</a></strong> or try something different.</p>
    </div>
@endsection