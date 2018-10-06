@extends('layouts.app')

@section('content')
<div class="ui raised very padded text container segments">
  @segment(['class' => ''])
    <p>Statuses</p>
  @endsegment
  @includeWhen(Auth::check(), 'statuses.create')
  @segment(['class' => ''])
    @foreach ($statuses as $status)
      <a href="{{ $status->path() }}">Read more</a>
      <p>{{ $status->body }}</p>
      <hr>
    @endforeach
  @endsegment
</div>
@endsection
