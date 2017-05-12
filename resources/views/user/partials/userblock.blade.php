<div class="ui card">
	<div class="image">
		<img src="/img/avatars/{{ Auth::user()->avatar }}" alt="{{ $user->getNameOrUsername() }}">
	</div>
	<div class="content">
		<a class="header">
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