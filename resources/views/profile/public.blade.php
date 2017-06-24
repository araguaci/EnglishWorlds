@extends('layouts.app')

@section('content')
  <div class="ui container">
    @include('user.partials.userblock')
    <hr>
    {{-- If there are no statuses --}}
    @if (!$statuses->count())
      <p>{{ $user->getNameOrUsername() }} hasn't posted anything yet.</p>
    @else
      <div class="ui container">
        @foreach($statuses as $status)
          <div class="event">
            <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
              <img src="/img/avatars/{{ $status->user->avatar }}" alt="{{ $status->user->getNameOrUsername() }}" height="30" width="30">
            </a>
              <h4><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
              <p>{{ $status->body }}</p>
              <ul>
                <li>{{ $status->created_at->diffForHumans() }}</li>
                <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
              </ul>
              {{-- Show status replies --}}
              @foreach ($status->replies as $reply)
                  <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                    <img src="/img/avatars/{{ $reply->user->avatar }}" alt="{{ $reply->user->getNameOrUsername() }}" height="30" width="30">
                  </a>
                    <h5><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
                    <p>{{ $reply->body }}</p>
                    <ul>
                      <li>{{ $reply->created_at->diffForHumans() }}</li>
                      <li>{{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}</li>
                    </ul>
              @endforeach
        @endforeach
      </div>
      </div>
    @endif
  <div>
    {{-- If user has friends --}}
    <h4>{{ $user->getNameOrUsername() }}'s friends</h4>
    @if (!$user->friends()->count())
      <p>{{ $user->getNameOrUsername() }} has no friends.</p>
    @else
        @foreach ($user->friends() as $user)
            @include('user.partials.userblock')
        @endforeach
    @endif
  </div>
@stop
