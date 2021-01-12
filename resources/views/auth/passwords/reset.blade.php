@extends('layouts.app')

@section('style')
    <style>
        .panel-default {
            border-color: #d3e0e9;
        }
        .panel {
            margin-bottom: 22px;
            margin-top: 70px;
            background-color: #fff;
            border: 1px solid black;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-heading {
            padding: 10px 15px;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;

            background: linear-gradient(120deg,#7f70f5,#0ea0ff);
            color: white;
            font-weight: bold
        }
        *, :after, :before {
            box-sizing: border-box;
        }

        .panel-body {
            padding: 15px;
        }

        *, :after, :before {
            box-sizing: border-box;
        }
        .labelcss{
            text-align: right;
            padding-top: 6px;
            color:blue;
            font-size: 17px
        }
        .form-group {
            margin-bottom: 1.5rem;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}" style="padding-top: 20px">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label labelcss"><b>E-Mail Address</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label labelcss"><b>Password</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label labelcss"><b>Confirm Password</b></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
