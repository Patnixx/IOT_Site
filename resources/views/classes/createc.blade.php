@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Create Class</h1>
        <form action="{{route('classStore')}}" method="POST">
          @csrf
          <input type="class" id="class_num" name="class_num" placeholder="Class Number">
          <input type="teacher" id="teacher" name="teacher" placeholder="Teacher">
          <div class="ram">
              <input type="radio" id="opened" name="status" value="Opened">
              <label for="opened">Opened</label><br>
              <input type="radio" id="closed" name="status" value="Closed">
              <label for="closed">Closed</label><br>
          </div>
          <button type="submit" name="submit">Create</button>
        </form>
      </div>
@endsection