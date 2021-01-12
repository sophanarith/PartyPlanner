@extends('layouts.app')

@section('content')

<main class="page hire-me-page"></main>

<div class="login-clean">
    <form method="post" action="{{ route('login') }}">
        {{ csrf_field() }}

        <h2 class="sr-only">Login Form</h2>
        <div class="illustration" style="background-image: url(&quot;assets/img/images.png&quot;);height: 227px;"></div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <input class="form-control" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group" style="text-align: center; margin-bottom: 0">
            <button id="myButton" class="btn btn-primary btn-block" type="submit" >Log In</button>

            <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-top: 5px">
                Forgot Your Password?
            </a>

        </div>
    </form>
</div>


@endsection
