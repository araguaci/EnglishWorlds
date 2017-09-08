<div class="ui inverted raised segment media" id="{{ $status->id }}">
  <a class="ui big image label" href="{{ route('users.show', ['username' => $status->user->name]) }}">
    <img src="{{ asset('img/avatars/39x39/'.$status->user->meta->avatar.'') }}" alt="{{ $status->user->name }}">
    {{ $status->user->name }}
  </a>
  <div class="media-body">
    <h1>{{ $status->body }}</h1>
      {{ $status->created_at->diffForHumans() }}
      {{-- if the currently authenticated user has not liked the status --}}
      @if (!Auth::user()->reactedToStatus($status))
        {{-- if the owner of the status is not the authenticated user --}}
        @if ($status->user->id !== Auth::user()->id)
          <div class="ui labeled button" tabindex="0">
            <div class="ui tiny red button">
              <i class="heart icon" href="{{ route('status.like', ['status_id' => $status->id]) }}"></i>Love
            </div>
            <a class="ui basic red left pointing label">
              {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
            </a>
          </div>
        @endif
        @if ($status->user->id === Auth::user()->id)
          <div class="ui disabled labeled button" tabindex="0">
            <div class="ui tiny red button">
              <i class="heart icon"></i> Like
            </div>
            <a class="ui tiny basic red left pointing label">
              {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
            </a>
          </div>
        @endif
      @endif
      @if (Auth::user()->id == $status->user->id)
        <a class="deleteStatus" data-id="{{ $status->id }}" href="#">Delete</a>
      @endif
    <div class="ui comments" id="repliesBlock{{ $status->id }}">
      <h3 class="ui inverted dividing header">Comments</h3>
      @foreach ($status->comments as $comment)
        @include('statuses.comment')
      @endforeach
    </div>
    @include('statuses.reply')
  </div>
</div>
