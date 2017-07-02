@extends('layouts.app')

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
				<form class="ui form segment error" action="{{ route('profile.edit')}}" method="POST" role="form" enctype="multipart/form-data">
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
							<div class="field{{ $errors->has('firstName') ? ' has-error' : '' }}">
								<label for="firstName">
									First name
								</label>
								<input type="text" name="firstName" value="{{ Request::old('firstName') ?: Auth::user()->firstName }}" id="firstName">
								@if ($errors->has('firstName'))
									<span class="help-block">{{ $errors->first('firstName') }}</span>
								@endif
							</div>
							<div class="field{{ $errors->has('lastName') ? ' has-error' : '' }}">
								<label for="lastName">
									Last name
								</label>
								<input type="text" name="lastName" value="{{ Request::old('lastName') ?: Auth::user()->lastName }}" id="lastName">
								@if ($errors->has('lastName'))
									<span class="help-block">{{ $errors->first('lastName') }}</span>
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
							Open File
							</label>
							<input type="file" id="avatar" name="avatar" style="display:none">
						<img class="ui medium circular image" src="/img/avatars/{{ Auth::user()->avatar }}">
						<button type="submit" class="ui primary button">Update</button>

				</form>
		</div>
	</div>
@stop
