@extends('layouts.app')

@section('content')
  <div class="ui two column centered grid">
    <div class="four column centered row">
      <div class="column">
        <h3>Your friends</h3>
        @if (!$friends->count())
            <p>You have no friends.</p>
        @else
          @foreach ($friends as $user)
            @include('user.partials.userblock')
          @endforeach
        @endif
      </div>
      <div class="column">
        <h4>Friends requests</h4>
        @if (!$requests->count())
          <p>You have no friend requests.</p>
        @else
          @foreach ($requests as $user)
            @include('user.partials.userblock')
          @endforeach
        @endif
      </div>
    </div>
  </div>
@stop
