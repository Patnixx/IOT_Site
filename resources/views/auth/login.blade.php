@extends('layouts.auth')
@section('logo')
  <img src="{{asset('assets/icons/login.svg')}}" alt="logo">
@endsection
@section('content')
<div class="login-container">
  <h1 class="green">Login</h1>
  <form method="POST" action="{{route('custom.login')}}">
    @csrf
    <div class="input-container">
      <input type="email" id="email" name="email" placeholder="Email">
    </div>
    <div class="input-container">
      <input type="password" id="password" name="password" placeholder="Password">
      @if ($errors->has('emailPassword'))
        <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
      @endif
    </div>
    <div class="buttons">
      <button type="submit">Log In</button>
      <a href="{{route('register')}}">Register</a>
    </div>
    
    <p><a href="#">Forgot your password?</a></p>
  </form>
</div>
@endsection 

