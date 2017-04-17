<div class="media">
  <a class="pull-left" href="{{ route('profile.index', ['username' => $user->name]) }}">
    <img class="media-object" src="{{ $user->getAvatarUrl() }}" alt="{{ $user->getNameOrUsername() }}">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $user->name]) }}">{{ $user->getNameOrUsername() }}</a></h4>
    @if ($user->location)
      <p>{{ $user->location }}</p>
    @endif
  </div>
</div>
