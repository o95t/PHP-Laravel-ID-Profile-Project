@extends('main.app')

@section('content')
<div class="w3-row-padding">
    <div class="w3-half w3-display-middle">
        <div class="w3-container w3-black">
          <h2>Reset Password</h2>
        </div>
        <br>
        <form class="w3-container" role="form" method="POST" action="{{ route('password.request') }}">

            <label for='email'>Email</label>
            <input class="w3-input" type="text" name='email' id='email' value="{{ $email or old('email') }}" required autofocus>
            <br>

            <label for='password'>Password</label>
            <input class="w3-input" type="password" name='password' id='password' required autofocus>
            <br>

            <label for='password-confirm'>Confirm Password</label>
            <input class="w3-input" type="password" name='password_confirmation' id='password-confirm' required autofocus>
            <br>

            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <button type='submit' class='w3-button w3-black w3-hover-black' name='submit'>
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection

