@extends('layouts.auth')
@section('logo')
  <img src="{{asset('assets/icons/register.svg')}}" alt="logo">
@endsection
@section('content')
<div class="login-container">
  <h1 class="green">Register</h1>
  <form>
    @csrf
    <input type="email" id="email" name="email" placeholder="Email">
    <input type="password" id="password" name="password" placeholder="Password">
    <div class="buttons">
      <button type="submit">Register</button>
      <a href="{{route('login')}}">Back to Log In</a>
    </div>
  </form>
</div>
@endsection 

