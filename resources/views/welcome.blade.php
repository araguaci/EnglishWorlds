@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
