@extends('main.app')
@section('content')
<div class="w3-display-middle">
	<p class='w3-xxlarge'>Let's make everyone know you.</p>
	<p class='w3-large w3-center'>ID Profile is like a small resume and a big business card.</p>
	@if(Auth::guest())
		<p class='w3-large w3-center'>Join us Now [<a href="{{route('login')}}">Register</a>]</p>
	@endif
</div>
@endsection