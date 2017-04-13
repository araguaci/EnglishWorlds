@extends('layouts.master')

@section('content')
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
      <article class="post">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="info">
          Posted by Salim on 12 April 2017
        </div>
        <div class="interaction">
          <a href="#">Like</a>
          <a href="#">Dislike</a>
          <a href="#">Edit</a>
          <a href="#">Delete</a>
        </div>
      </article>
      <article class="post">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="info">
          Posted by Salim on 12 April 2017
        </div>
        <div class="interaction">
          <a href="#">Like</a>
          <a href="#">Dislike</a>
          <a href="#">Edit</a>
          <a href="#">Delete</a>
        </div>
      </article>
    </div>
  </section>
@endsection
