@extends('layouts.app')

@section('content')
  @include('status.post')
	<div class="row">
		<div class="col-lg-5" id="statusesBlock">

			@if (!$statuses->count())
				<p id="nullStatuses">There's nothing in your timeline, yet.</p>
			@else
				@foreach($statuses as $status)
					@include('status.status')
				@endforeach
				{!! $statuses->render() !!}
			@endif
		</div>
	</div>
@stop
