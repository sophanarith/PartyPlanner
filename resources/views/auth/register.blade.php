@extends('layouts.app')

@section('content')

<main class="page cv-page"></main>
<div class="register-photo">
    <div class="form-container" style="max-width: 1050px">
        <div class="image-holder"></div>

        <form method="post" action="{{ route('register') }}" style="padding:40px; width: 500px;color: black">
            {{ csrf_field() }}

            <h2 class="text-center"><strong>Register an account</strong></h2>
            <div class="row">

                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus/>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="col-md-6">


                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required/>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="PhoneNumber" value="{{ old('phone') }}" required/>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="col-sm-6">



                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>

                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
            <a class="already" href="{{url('login')}}">You already have an account? Login here.</a></form>
    </div>
</div>


@endsection
