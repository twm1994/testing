<article>
  <strong>{{$comment->created_at->diffForHumans()}} by {{$comment->user->name}}: </strong>
  <p>{{$comment->body}}</p>
</article>