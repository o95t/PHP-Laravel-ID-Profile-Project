@extends('main.app')
@section('content')
<!-- First Parallax Image with Logo Text -->
  <div class="w3-display-middle" style="white-space:nowrap;">
    <div><span class="w3-center w3-padding-large w3-black w3-wide w3-animate-opacity" style='font-size:6em;'>ID Profile</span></div>
    	<div class='w3-center'>
    	@if(Auth::guest())
	    <a href='{{route("login")}}' class="w3-button w3-white w3-border w3-border-blue w3-large w3-hover-none">Login</a>
	  	<a href='{{route("register")}}' class="w3-button w3-white w3-border w3-border-red w3-large w3-hover-none">Register</a>
	  	@else
	  	<a href='/id' class="w3-button w3-white w3-border w3-border-black w3-large w3-hover-none">show me</a>
	  	@endif
	  </div>
  </div>
@endsection