@extends('layouts.blank', array('title'=>'Register', 'body_class'=>'register-page'))

@section('content')
<div class="register-box">
    <div class="register-logo">
        <img src="{{ asset('logo/logo-sm.png') }}" alt="Distribution Connection">
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <div id="alert-login"></div>

        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ $email or old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                <input id="password-confirm" type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div>
            </div>
        </form>

        <div class="text-center link-footer">
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a><br>
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

@endsection