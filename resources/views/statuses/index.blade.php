@extends('layouts.app')

@section('content')
<div class="ui raised very padded container segments">
	<div class="ui segment">
		<p>Statuses</p>
	</div>
	@includeWhen(Auth::check(), 'statuses.create')
	<div class="level">
		<div class="ui segment">
			@foreach ($statuses as $status)
				<a class="flex" href="{{ $status->path() }}">Read more</a>
				<a class="comments-count" href="{{ $status->path() }}">
					{{ $status->comments_count }} {{ str_plural('comment', $status->comments_count) }}
				</a>
				<p>{{ $status->body }}</p>
				<hr>
			@endforeach
		</div>
	</div>
</div>
@endsection
