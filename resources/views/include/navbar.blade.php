<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="{{ url('/') }}" class="w3-bar-item w3-button" style='letter-spacing:1px;'><b>{{ config('app.name', 'Laravel') }}</b></a>
    <a href="{{ url('/') }}" class="w3-bar-item w3-button">Home</a>
    <a href="{{ url('/about') }}" class="w3-bar-item w3-button">About</a>
    <a href="{{ url('/companies') }}" class="w3-bar-item w3-button">Companies</a>
    <form method='POST' action='{{url("search")}}'>
      <input type="text" class="w3-bar-item w3-input" name='string' placeholder="Search..">
      {{ csrf_field() }}
      <button class="w3-bar-item w3-button w3-black" type='submit'>Go</button>
    </form>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
        @if (Auth::guest())
            <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
            <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
        @else
          <div class="w3-dropdown-hover">
            <button class="w3-button">{{ Auth::user()->name }}</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
              <a href="{{url('/id')}}" class="w3-bar-item w3-button">My Id</a>
              <a href="{{url('/setting')}}" class="w3-bar-item w3-button">Setting</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="w3-bar-item w3-button">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
              </form>
            </div>
          </div>
        @endif
    </div>
  </div>
</div>
