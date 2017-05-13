<div class="media">
  <a class="ui big image label" href="{{ route('profile.index', ['username' => $status->user->name]) }}">
    <img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}">
    {{ $status->user->getNameOrUsername() }}
  </a>
  <div class="media-body">
    <h1>{{ $status->body }}</h1>
      {{ $status->created_at->diffForHumans() }}
      @if (!Auth::user()->hasLikedStatus($status))
        @if ($status->user->id !== Auth::user()->id)
          <div class="ui labeled button" tabindex="0">
            <div class="ui red button">
              <a class="heart icon" href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a>
            </div>
            <a class="ui basic red left pointing label">
              {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
            </a>
          </div>
        @endif
        <div class="ui disabled labeled button" tabindex="0">
          <div class="ui tiny red button">
            <i class="heart icon"><a href="{{ route('status.like', ['statusId' => $status->id]) }}"></a></i> Like
          </div>
          <a class="ui tiny basic red left pointing label">
            {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
          </a>
        </div>
      @endif
      @if (Auth::user()->id == $status->user->id)
        <a href="{{ route('status.delete', ['statusId' => $status->id ])}}">Delete</a>
        <a href="#" data-statusid="{{ $status->id }}"></a>
      @endif
    <div class="ui comments" id="repliesBlock{{ $status->id }}">
      <h3 class="ui dividing header">Comments</h3>
      @foreach ($status->replies as $reply)
        @include('status.comment')
      @endforeach
    </div>
    @include('status.reply')
  </div>
</div>
