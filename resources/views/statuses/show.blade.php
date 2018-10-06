@extends('layouts.app')

@section('content')
<div class="ui container segments">
  @segment(['class' => ''])
    <a href="#">
      {{ $status->ownerName() }}
    </a> posted
  @endsegment
  @segment(['class' => ''])
    {{ $status->body }}
  @endsegment
  @segment(['class' => 'comments'])
    <h3 class="ui dividing header">Comments</h3>
    @foreach ($status->comments as $comment)
      @include('statuses.comment')
    @endforeach
  @endsegment
  @segment(['class' => ''])
    @auth
    <form class="ui reply form" method="post" action="{{ route('post_comment', ['status' => $status->id]) }}">
      @csrf
      <div class="field">
        <input type="text" autocomplete="off" name="body" id="comment" placeholder="Write a comment" onsubmit="submit">
      </div>
    </form>
    @else
      <div class="ui center aligned container">
        <div class="ui compact floating message">
          <p>Please <a href="{{ route('login') }}">Login</a> to comment.</p>
        </div>
      </div>
    @endauth
  @endsegment
</div>
@endsection
