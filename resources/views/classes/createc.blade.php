@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Create Class</h1>
        <form method="POST">
          @csrf
          <input type="class" id="class" name="class" placeholder="Class Number">
          <input type="teacher" id="teacher" name="teacher" placeholder="Teacher">
          <input type="status" id="status" name="status" placeholder="Status">
          <button type="submit" name="submit">Create</button>
        </form>
      </div>
@endsection