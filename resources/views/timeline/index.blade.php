@extends('layouts.app')

@section('content')
	<div class="ui container">
	@include('status.post')
		<div class="" id="statusesBlock">
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

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/timeline.css')}} ">
  <link rel="stylesheet" href="{{ asset('css/prosemirror.css')}} ">
@endsection

@section('scripts')
	{{-- <script src="{{ asset('js/main_bundle.js') }}"></script> --}}
@endsection
