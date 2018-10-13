@extends('layouts.master')

@section('content')
<div class="col-sm-8">
  <h1>Register</h1>
  <form method="POST" action="/register">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @include('layouts.error')
  </form>
</div>
@endsection