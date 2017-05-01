<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
				<img alt="Brand" class="pull-left" src="{{ asset('img/brand.png') }}" width="35" height="35">
				{{ config('app.name', 'Laravel') }}
			</a>
		</div>

		@if(Auth::user())
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav"></ul>
			<form class="navbar-form navbar-left" action="{{ route('search.results') }}">
				<div class="form-group">
					<input type="text" name="query" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('home') }}">Timeline</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('friends.index') }}">Friends</a></li>
						<li><a href="{{ route('profile.index', ['username' => Auth::user()->name]) }}">Profile</a></li>
						<li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		@else
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url('login') }}">Login</a></li>
				<li><a href="{{ url('register') }}">Sign up</a></li>
			</ul>
		@endif
	</div><!-- /.container-fluid -->
</nav>
