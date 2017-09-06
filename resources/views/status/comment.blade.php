<div class="comment">
  <a class="avatar">
    <img src="{{ secure_asset('img/avatars/35x35/'.$reply->user->avatar.'') }}" alt="{{ $reply->user->getNameOrUsername() }}">
  </a>
  <div class="content">
    <a class="author" href="{{ route('profile.index', ['username' => $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }}</a>
  </div>
  <div class="metadata">
    <span class="date">{{ $reply->created_at->diffForHumans() }}</span>
  </div>
  <div class="text">
    {{ $reply->body }}
  </div>
  <div class="actions">
    <a class="reply" href="#">Reply</a>
    @if (!Auth::user()->hasLikedStatus($reply))
      @if ($status->user->id !== Auth::user()->id)
        <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
      @endif
    @endif
  </div>
</div>
