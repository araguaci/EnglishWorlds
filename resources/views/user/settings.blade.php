@extends('layouts.master')

@section('content')
	<div class="ui two column centered grid">
		<div class="column">
			<h1 class="ui header centered">Update your profile</h1>
		</div>
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		<div class="four column centered row">
			<div class="column">
				<form class="ui form segment error" action="{{ route('settings')}}" method="POST" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}
							<div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name">
									Username
								</label>
								<input type="text" name="name" value="{{ Request::old('name') ?: Auth::user()->name }}" id="name">
								@if ($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('first_name') ? ' has-error' : '' }}">
								<label for="first_name">
									First name
								</label>
								<input type="text" name="first_name" value="{{ Request::old('first_name') ?: Auth::user()->meta->first_name }}" id="first_name">
								@if ($errors->has('first_name'))
									<span class="help-block">{{ $errors->first('first_name') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<label for="last_name">
									Last name
								</label>
								<input type="text" name="last_name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}" id="last_name">
								@if ($errors->has('last_name'))
									<span class="help-block">{{ $errors->first('last_name') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('location') ? ' has-error' : '' }}">
								<label for="location">
									Location
								</label>
								<input type="text" name="location" value="{{ Request::old('location') ?: Auth::user()->location }}" id="location">
								@if ($errors->has('location'))
									<span class="help-block">{{ $errors->first('location') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('oldPassword') ? ' has-error' : '' }}">
								<label for="oldPassword">
									Old Password:
								</label>
								<input type="password" name="oldPassword" id="oldPassword">
								@if ($errors->has('oldPassword'))
									<span class="help-block">{{ $errors->first('oldPassword') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">
									New Password:
								</label>
								<input type="password" name="password" id="password">
								@if ($errors->has('password'))
									<span class="help-block">{{ $errors->first('password') }}</span>
								@endif
							</div>
							<div class="field">
								<label for="password-confirm">
									Confirm Password:
								</label>
								<input type="password" name="password_confirmation" id="password-confirm">
							</div>
							<label for="avatar" class="ui icon button">
								<i class="file icon"></i>
							  Choose Avatar
							</label>
							<input type="file" id="avatar" name="avatar" style="display:none">
						<img class="ui medium circular image" src="/img/avatars/{{ Auth::user()->meta->avatar }}">
						<button type="submit" class="ui primary button">Update</button>

				</form>
		</div>
	</div>
@stop
