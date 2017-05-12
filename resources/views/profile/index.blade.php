@extends('layouts.app')

@section('content')
  <div class="ui container">
    @include('user.partials.userblock')
    <hr>
    @if (!$statuses->count())
      <p>{{ $user->getNameOrUsername() }} hasn't posted anything yet.</p>
    @else
      <div class="ui feed">
        @foreach($statuses as $status)
          <div class="event">
            <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
              <img src="{{ $status->user->avatar }}" alt="{{ $status->user->getNameOrUsername() }}">
            </a>
              <h4><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
              <p>{{ $status->body }}</p>
              <ul>
                <li>{{ $status->created_at->diffForHumans() }}</li>
                @if ($status->user->id !== Auth::user()->id)
                  <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">Like</a></li>
                @endif
                <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
              </ul>

              @foreach ($status->replies as $reply)
                  <a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                    <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->getNameOrUsername() }}">
                  </a>
                    <h5><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
                    <p>{{ $reply->body }}</p>
                    <ul>
                      <li>{{ $reply->created_at->diffForHumans() }}</li>
                      @if ($reply->user->id !== Auth::user()->id)
                        <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Like</a></li>
                      @endif
                      <li>{{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}</li>
                    </ul>
              @endforeach

              @if ($authUserIsFriend || Auth::user()->id === $status->user->id)
                <form role="form" class="ui form" action="#" method="post">
                  <div class="field{{ $errors->has("reply-{statusId}") ? ' has-error' : '' }}">
                    <textarea name="reply-{{ $status->id }}" rows="2" placeholder="Reply to this status"></textarea>
                    @if ($errors->has("reply-{$status->id}"))
                      <span class="help-block">{{ $errors->first("reply-{$statusId}") }}</span>
                    @endif
                  </div>
                  <input type="submit" value="Reply" class="ui small primary button">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
              @endif
        @endforeach
          </div>
      </div>
    @endif
  <div>
    @if (Auth::user()->hadFriendRequestPending($user))
      <p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>
    @elseif (Auth::user()->hasFriendRequestReceived($user))
      <a href="{{ route('friend.accept', ['username' => $user->name]) }}" class="ui primary button">Accept friend request</a>
    @elseif (Auth::user()->isFriendsWith($user))
      <p>You and {{ $user->getNameOrUsername() }} are friends.</p>
      <form class="" action="{{ route('friend.delete', ['username' => $user->username]) }}" method="post">
        <input type="submit" name="" value="Delete friend" class="ui red button">
        {{ csrf_field() }}
      </form>
    @elseif (Auth::user()->id != $user->id)
      <button class="ui basic button">
        <i class="icon user"></i>
        <a href="{{ route('friend.add', ['username' => $user->name]) }}">Add as friend</a>
      </button>
    @endif
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
