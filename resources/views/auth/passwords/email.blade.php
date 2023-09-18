@extends('main.app')

@section('content')
<div class="w3-row-padding">
    <div class="w3-half w3-display-middle">
        <div class="w3-container w3-black">
          <h2>Reset Password</h2>
        </div>
        <br>
        <form class="w3-container" role="form" method="POST" action="{{ route('password.email') }}">

            <label for='email'>Email</label>
            <input class="w3-input" type="text" name='email' required>
            <br>
            {{ csrf_field() }}
            <button type='submit' class='w3-button w3-black w3-hover-black' name='submit'>
                Send Password Reset Link
            </button>
        </form>
    </div>
</div>
@endsection

