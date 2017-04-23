@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-6 offset-1">
      <form role="form" action="#" id="postStatus">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
          <textarea class="form-control" rows="2" placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" required id="status"></textarea>
          @if ($errors->has('status'))
            <span class="help-block">{{ $errors->first('status') }}</span>
          @endif
        </div>
        <button type="submit" class="btn btn-default">Update status</button>
        {{ csrf_field() }}
      </form>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 offset-1">

      @if (!$statuses->count())
        <p>There's nothing in your timeline, yet.</p>
      @else
        @foreach($statuses as $status)
        <div id="postRequestData"></div>
          <div class="media post">
            <div class="pull-left">
              <a href="{{ route('profile.index', ['username' => $status->user->name]) }}" class="">
                <img src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}" class="media-object">
              </a>
              <ul class="usr-likes">
                @if (!Auth::user()->hasLikedStatus($status))
                  @if ($status->user->id !== Auth::user()->id)
                  <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}"><img src="{{ asset('img/heart-d.png') }}" alt=""></a></li>
                  @endif
                @else
                 <li><img src="{{ asset('img/heart.png') }}" alt=""></li>
                @endif
                <li>{{ $status->likes->count() }}</li>
              </ul>
            </div>
            <div class="media-body">
              <ul class="list-inline">
                <li><h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $status->user->name]) }}">{{ $status->user->getNameOrUsername() }}</a></h4></li>
                <li>{{ $status->created_at->diffForHumans() }}</li>
              </ul>

              <p>{{ $status->body }}</p>

              @foreach ($status->replies as $reply)
              <div class="comments">
                <div class="media comment">
                  <div class="pull-left">
                  <a href="{{ route('profile.index', ['username' => $reply->user->name]) }}" class="">
                    <img src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object">
                  </a>
                  <ul class="usr-likes">
                    @if (!Auth::user()->hasLikedStatus($reply))
                      @if ($status->user->id !== Auth::user()->id)
                      <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}"><img src="{{ asset('img/heart-d.png') }}" alt=""></a></li>
                      @endif
                    @else
                     <li><img src="{{ asset('img/heart.png') }}" alt=""></li>
                    @endif
                    <li>{{ $reply->likes->count() }}</li>
                  </ul>
                  </div>
                  <div class="media-body">
                    <ul class="list-inline">
                      <li><h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->user->name]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5></li>
                      <li>{{ $reply->created_at->diffForHumans() }}</li>
                    </ul>
                    <p>{{ $reply->body }}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="statu-replay">
                <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                  <div class="form-group{{ $errors->has("reply-{statusId}") ? ' has-error' : '' }}">
                    <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to this status" required></textarea>
                    @if ($errors->has("reply-{status->id}"))
                      <span class="help-block">{{ $errors->first("reply-{$statusId}") }}</span>
                    @endif
                  </div>
                  <input type="submit" value="Reply" class="btn btn-default btn-sm">
                  {{ csrf_field() }}
                </form>
              </div>

            </div>
          </div>
        @endforeach
        {!! $statuses->render() !!}
      @endif
    </div>
  </div>
@stop
