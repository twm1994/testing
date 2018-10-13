@extends('layouts.master')

@section('content')
<div class="col-sm-8">
  <h1>Sign In</h1>
  <form method="POST" action="/login">
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
    @include('layouts.error')
  </form>
</div>
@endsection