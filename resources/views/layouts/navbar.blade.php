<div class="ui fluid container">
	<div class="ui secondary menu">
		<!-- Left Side Of Navbar -->
		<a href="{{ url('/') }}" class="header item">
			<img class="logo" src="/images/logo.png">&nbsp;
			{{ config('app.name') }}
		</a>
		<div class="ui search selection dropdown header item">
			<i class="dropdown icon"></i>
			<div class="default text">Select Tag</div>
			<div class="menu">
				@foreach ($tags as $tag)
					<a class="item" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
				@endforeach
			</div>
		</div>
		<div class="ui search selection dropdown header item">
			<i class="dropdown icon"></i>
			<div class="default text">Browse</div>
			<div class="menu">
				<a class="item" href="/?popular">Popular Statuses of All Time</a>
				<a class="item" href="/">All statuses</a>
				<a class="item" href="/">My Statuses</a>
			</div>
		</div>
		<!-- Right Side Of Navbar -->
		<div class="right menu">
			<!-- Authentication Links -->
			@guest
				<a href="{{ route('login') }}" class="header item">
					Login
				</a>
				<a href="{{ route('register') }}" class="header item">
					Register
				</a>
			@else
				<div class="ui dropdown header item">
					<div class="text">
						{{ Auth::user()->username }}
					</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item" href="/?by={{auth()->user()->username}}">My Posts</a>
						<a class="item" href="{{ route('logout') }}"
							 onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
								Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
					</div>
				</div>
			@endguest
		</div>
	</div><!-- End of fixed menu -->
</div>
