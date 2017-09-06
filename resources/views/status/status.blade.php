<div class="media" id="{{ $status->id }}">
  <a class="ui big image label" href="{{ route('profile.index', ['username' => $status->user->name]) }}">
    <img src="{{ secure_asset('img/avatars/39x39/'.$status->user->avatar.'') }}" alt="{{ $status->user->getNameOrUsername() }}">
    {{ $status->user->getNameOrUsername() }}
  </a>
  <div class="media-body">
    <h1>{{ $status->body }}</h1>
      {{ $status->created_at->diffForHumans() }}
      {{-- if the currently authenticated user has not liked the status --}}
      @if (!Auth::user()->hasLikedStatus($status))
        {{-- if the owner of the status is not the authenticated user --}}
        @if ($status->user->id !== Auth::user()->id)
          <div class="ui labeled button" tabindex="0">
            <div class="ui tiny red button">
              <i class="heart icon" href="{{ route('status.like', ['statusId' => $status->id]) }}"></i>Like
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
      <h3 class="ui dividing header">Comments</h3>
      @foreach ($status->replies as $reply)
        @include('status.comment')
      @endforeach
    </div>
    @include('status.reply')
  </div>
</div>
