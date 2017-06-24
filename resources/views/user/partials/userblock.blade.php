<div class="ui card">
	<a class="image" href="{{ route('profile.index', ['username' => $user->name]) }}">
		<img src="/img/avatars/{{ $user->avatar }}" alt="{{ $user->getNameOrUsername() }}">
	</a>
	<div class="content">
		<a class="header" href="{{ route('profile.index', ['username' => $user->name]) }}">
			@if ($user->firstName)
				{{ $user->firstName }}
			@endif
		</a>
		<div class="meta">
			<span class="date">
				Joined {{ $user->created_at->diffForHumans() }}
			</span>
		</div>
		<div class="description">
			{{ $user->firstName }} is living in {{ $user->location }}.
		</div>
	</div>
	<div class="extra content">
		<a>
			<i class="user icon"></i>
			{{ $user->friends()->count() }} friends
		</a>
	</div>
</div>
