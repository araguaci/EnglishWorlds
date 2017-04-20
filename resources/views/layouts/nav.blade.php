<div class="container-fluid">
      <div class="row usr-nav">

        <i class="col-2 offset-1"><a class="" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            </i>
        @if (Auth::check())
          <div class="col-3 usr-nav_search">
              <form class="" role="search" action="{{ route('search.results') }}">
                <div class="">
                  <input type="text" name="query" class="usr-nav_input" placeholder="Find people" required>
                </div>
              </form>
          </div>
          <div class="col col offset-2">
            <ul class="usr-nav_link">
              <li><a href="{{ url('/home') }}">Timeline</a></li>
              <li class="dropdown">{{ Auth::user()->name }} <i class="arrow down"></i>
                <ul class="dropdown_content">
                  <li><a href="{{ route('friends.index') }}">Friends</a></li>
                  <li><a href="{{ route('profile.index', ['username' => Auth::user()->name]) }}">Profile</a></li>
                  <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form></li>
                </ul>
              </li>
              
            </ul>
          </div>  
          @endif
      </div>
    </div >