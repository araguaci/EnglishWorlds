@extends('layouts.master')

@section('content')

    <div class="sidebar">
        <div class="raw-margin-bottom-90">
            @include('dashboard.panel')
        </div>
    </div>

    <div class="main">
        @yield('content')
    </div>

@stop