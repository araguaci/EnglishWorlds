@extends('layouts.app')

@section('content')
<div class="ui container segments">
  @segment(['class' => ''])
    <p>{{ __('Statuses') }}</p>
  @endsegment
  @auth
    <form class="ui form" action="{{ route('statuses') }}" method="post">
      @csrf
      <label for="status">Write status</label>
      <div class="ui input">
        <input type="text" name="body" value="{{ old('status') }}" onsubmit="this.form.submit()" id="status">
      </div>
    </form>
  @endauth
  @segment(['class' => ''])
    @foreach ($statuses as $status)
      <a href="{{ $status->path() }}">{{ __('Read more') }}</a>
      <p>{{ $status->body }}</p>
      <hr>
    @endforeach
  @endsegment
</div>
@endsection
