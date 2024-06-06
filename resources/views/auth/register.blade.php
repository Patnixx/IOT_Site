@extends('layouts.auth')
@section('title')
    <title>CM | Register</title>
@endsection
@section('logo')
  <img src="{{asset('assets/icons/register.svg')}}" alt="logo">
@endsection
@section('content')
<div class="login-container">
  <h1 class="green">Register</h1>
  <form action="{{route('custom.register')}}" method="POST">
    @csrf
    <div class="input-container">
      <input type="text" id="name" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{@old('name')}}">
      @if ($errors->has('name'))
        <span class="text-danger" role="alert"><strong>{{$errors->first('name')}}</strong></span>
      @endif
    </div>
    <div class="input-container">
      <input type="email" id="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{@old('email')}}">
      @if ($errors->has('email'))
        <span class="text-danger" role="alert"><strong>{{$errors->first('email')}}</strong></span>
      @endif
    </div>
    <div class="input-container">
      <input type="password" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror" value="{{old('pass')}}">
      @if ($errors->has('password'))
        <span class="text-danger" role="alert"><strong>{{$errors->first('password')}}</strong></span>
      @endif
    </div>
    <div class="input-container">
      <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="@error('cpassword') is-invalid @enderror" autocomplete="new-password">
      @if ($errors->has('cpassword'))
        <span class="text-danger" role="alert"><strong>{{$errors->first('cpassword')}}</strong></span>
      @endif
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <span class="text-danger" role="alert"><strong>{{$error}}</strong></span>
        @endforeach
      @endif
    </div>
    <div class="buttons">
      <button type="submit">Register</button>
      <a href="{{route('login')}}">Back to Log In</a>
    </div>
  </form>
</div>
@endsection 

