@extends('layouts.error')
@section('title')
    <title>CM | Error 403</title>
@endsection
@section('logo')
    <img src="{{asset('assets/icons/403_error.svg')}}" alt="logo">
@endsection
@section('content')
    <div class="error-content">
        <h1 class="error-num">Error 403</h1>
        <h2 class="error-subtitle">Denied access</h2>
        <p class="error-desc">Sorry, you don't have permission to access this page. Try to contact this page's <strong><a href="https://github.com/Patnixx" target="_blank">admin</a></strong> or try logging in with different credentials.</p>
        <a href="{{ route('logout') }}" class="login-a">Back to login</a>
    </div>
@endsection