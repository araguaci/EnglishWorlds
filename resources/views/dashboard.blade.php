@extends('layouts.master')

@section('title')
Timeline
@endsection

@section('content')
  @include('includes.message-block')
  <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
      <header><h3>What do you have to say?</h3></header>
      <form class="" action="{{ route('post.create') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <textarea name="body" class="form-control" id="body" rows="5" cols="80" placeholder=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
    </div>
  </section>
  <section class="row posts">
    <div class="col-md-6 col-md-offset-3">
      <header><h3>What other people say...</h3></header>
      @foreach($posts as $post)
      <article class="post">
        <p>{{ $post->body }}</p>
        <div class="info">
          Posted by {{ $post->user->first_name }} about {{ $post->created_at->diffForHumans() }}
        </div>
        <div class="interaction">
          <a href="#">Like</a>
          <a href="#">Dislike</a>
          @if(Auth::user() == $post->user)
            <a href="#">Edit</a>
            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
          @endif
        </div>
      </article>
      @endforeach
    </div>
  </section>
@endsection
