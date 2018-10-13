@extends('layouts.master')

@section('content')
<h1 class="jumbotron-heading">Public a post</h1>
<hr>
<form method="POST" action="/posts">
  {{csrf_field()}}
  <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control" id="title" name="title">
    <small class="form-text text-muted"> Blog title</small>
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control" rows="15"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Publish</button>
  </div>
  @include('layouts.error')
</form>
@endsection