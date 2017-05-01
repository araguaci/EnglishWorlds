<div class="media">
  <a href="{{ route('profile.index', ['username' => $status->user->name]) }}" class="pull-left">
    <img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}" class="media-object">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->name]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
    <p>{{ $status->body }}</p>
    <ul class="list-inline">
      <li>{{ $status->created_at->diffForHumans() }}</li>
      @if (!Auth::user()->hasLikedStatus($status))
        @if ($status->user->id !== Auth::user()->id)
        <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a></li>
        @endif
      @endif
      <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
    </ul>
    @foreach ($status->replies as $reply)
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
    @endforeach

    <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
      <div class="form-group{{ $errors->has("reply-{statusId}") ? ' has-error' : '' }}">
        <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to this status" required></textarea>
        @if ($errors->has("reply-{status->id}"))
          <span class="help-block">{{ $errors->first("reply-{$statusId}") }}</span>
        @endif
      </div>
      <input type="submit" value="Reply" class="btn btn-default btn-sm">
      {{ csrf_field() }}
    </form>
  </div>
</div>
