<div class="blog-post">
  <h2 class="blog-post-title">{{$post->title}}</h2>
  <p class="blog-post-meta">
    {{$post->created_at->toFormattedDateString()}} by
    {{$post->user->name}}
  </p>
  <p>{{$post->body}}</p>
  <hr>
  <div class="comment">
    <h2 class="blog-post-title">Comments</h2>
    <ul class="list-group">
      @foreach($post->comments as $comment)
        <li class="list-group-item">
          @include('posts.comment')
        </li>
      @endforeach
    </ul>
  </div>
  <hr>
  <div class="card">
    <div class="card-body">
      <form method="POST" action="/posts/{{$post->id}}/comments">
        {{csrf_field()}}
        <div class="form-group">
          <textarea name="body" placeholder="Leave a common" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
        @include('layouts.error')
      </form>
    </div>
  </div>
</div><!-- /.blog-post -->