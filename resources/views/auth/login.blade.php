@extends('main.app')

@section('content')
<div class="w3-row-padding">
    <div class="w3-half w3-display-middle">
        <div class="w3-container w3-black">
          <h2>Login</h2>
        </div>
        <br>
        <form class="w3-container" role="form" method="POST" action="{{ route('login') }}">

            <label for='email'>Email</label>
            <input class="w3-input" type="text" name='email' required>
            <br>
            <label for='password'>Password</label>
            <input class="w3-input" type="password" name='password' required>
            <br>
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
            <br><br>
            {{ csrf_field() }}
            <button type='submit' class='w3-button w3-blue w3-hover-black' name='submit'>
                Login
            </button>
            <br><br>
            <a style='text-decoration: none;'href="{{ route('password.request') }}">Forgot Your Password?</a>

        </form>
    </div>
</div>
@endsection


