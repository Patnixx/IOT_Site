@extends('layouts.master')
@section('content')
<div class="login-container">
        <h1 class="green">Login</h1>
        <form>
          @csrf
          <input type="email" id="email" name="email" placeholder="Email">
          <input type="password" id="password" name="password" placeholder="Password">
          <button type="submit">Log In</button>
          <p><a href="#">Forgot your password?</a></p>
        </form>
      </div>
@endsection