@extends('layouts.master')
@section('content')
<div class="register-container">
        <h1 class="green">Edit Class</h1>
        <form>
          <input type="class" id="class" name="class" placeholder="Class Number">
          <input type="teacher" id="teacher" name="teacher" placeholder="Teacher">
          <input type="status" id="status" name="status" placeholder="Status">
          <button type="submit">Save</button>
        </form>
      </div>
@endsection