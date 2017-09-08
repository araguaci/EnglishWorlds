<div class="ui card">
	<a class="image" href="{{ route('users.show', ['username' => $user->name]) }}">
		<img src="/img/avatars/{{ $user->meta->avatar }}" alt="{{ $user->name }}">
	</a>
	<div class="content">
		<a class="header" href="{{ route('users.index', ['username' => $user->name]) }}">
			@if ($user->meta->first_name)
				{{ $user->meta->first_name }}
			@endif
		</a>
		<div class="meta">
			<span class="date">
				Joined {{ $user->created_at->diffForHumans() }}
			</span>
		</div>
		<div class="description">
			{{ $user->meta->first_name }} is living in {{ $user->meta->location }}.
		</div>
	</div>
	<div class="extra content">
		Lorem ipsum dolor sit amet
	</div>
</div>
