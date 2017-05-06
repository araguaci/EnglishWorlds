<div class="media">
  <a href="{{ route('profile.index', ['username' => $reply->user->name]) }}" class="pull-left">
    <img src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object">
  </a>
  <div class="media-body">
    <h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
    <p>{{ $reply->body }}</p>
    <ul class="list-inline">
      <li>{{ $reply->created_at->diffForHumans() }}</li>
      @if (!Auth::user()->hasLikedStatus($reply))
        @if ($status->user->id !== Auth::user()->id)
          <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
        @endif
      @endif
      <li>{{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}</li>
    </ul>
  </div>
</div>
