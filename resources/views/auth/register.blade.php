@extends('main.app')

@section('content')
<div class="w3-row-padding">
    <div class="w3-half w3-display-middle">
        <div class="w3-container w3-black">
          <h2>Join us</h2>
        </div>
        <br>
        <form class="w3-container" role="form" method="POST" action="{{ route('register') }}">

            <label for='name'>Name</label>
            <input class="w3-input" type="text" name='name' required autofocus>
            <br>
            <label for='email'>Email</label>
            <input class="w3-input" type="text" name='email' required>
            <br>
            <label for='password'>Password</label>
            <input class="w3-input" type="password" name='password' required>
            <br>
            <label for='password-confirm'>Re-Password</label>
            <input class="w3-input" type="password" name='password_confirmation' required>
            <br>
            {{ csrf_field() }}
            <input type='submit' class='w3-button w3-red w3-hover-black' name='submit' value='Register'>
        </form>
    </div>
</div>
@endsection
