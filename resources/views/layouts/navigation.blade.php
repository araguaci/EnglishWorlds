<div class="ui pointing fixed menu" id="topNavbar">
	<a class="item" id="navbarBrand" href="/">
		<img alt="{{ config('app.name') }}" src="{{ asset('img/brand.png') }}" width="35" height="35">
		{{ config('app.name') }}
	</a>
	@if(Auth::user())
			<div class="item" id="topNavSearchBar">
				<form class="ui transparent icon input" action="{{ route('search.results') }}">
					<div class="ui transparent icon input">
						<input placeholder="Search..." type="text" name="query">
						<i class="search link icon"></i>
					</div>
				</form>
			</div>
	@endif
	<div class="right menu">
		@if(Auth::user())
			<a href="{{ url('/') }}" class="active item">Timeline</a>
			<div class="ui dropdown item" id="profileDropdown">
				{{ Auth::user()->name }}
				<i class="dropdown icon"></i>
				<div class="menu">
					<a href="{{ route('friends.index') }}" class="item">Friends</a>
					<a href="{{ route('profile.index', ['username' => Auth::user()->name]) }}" class="item">Profile</a>
					<a href="{{ route('profile.edit') }}" class="item">Edit Profile</a>
					<div class="divider"></div>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="item">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
				</div>
			</div>
		@elseif (!Auth::user())
			<a href="{{ url('login') }}" class="ui item">Login</a>
			<a href="{{ url('register') }}" class="ui item">Sign up</a>
		@endif
	</div>
</div>
