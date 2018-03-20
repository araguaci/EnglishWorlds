@extends('layouts.app')

@section('content')
<div class="ui container segments">
  <div class="ui segment">
    <p>{{ __('Statuses') }}</p>
  </div>
  <div class="ui segment">
    @foreach ($statuses as $status)
      <a href="{{ $status->path() }}">{{ __('Read more') }}</a>
      <p>{{ $status->body }}</p>
      <hr>
    @endforeach
  </div>
</div>
@endsection
