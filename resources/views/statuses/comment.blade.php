<div class="comment">
  <div class="content">
    <a class="author" href="#">{{ $comment->ownerName() }}</a>
    <div class="metadata">
      <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <div class="text">
      {{ $comment->body }}
    </div>
  </div>
</div>
