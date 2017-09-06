@extends('layouts.master')

@section('content')

  <div class="main">
      @yield('content')
  </div>

@endsection

@section('scripts')
  <script src="{{ asset('js/script.js') }}" charset="utf-8"></script>
@endsection
