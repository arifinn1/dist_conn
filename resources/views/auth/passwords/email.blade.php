@extends('layouts.blank', array('title'=>'Reset Password', 'body_class'=>'register-page'))

@section('content')
<div class="register-box">
    <div class="register-logo">
        <img src="{{ asset('logo/logo-sm.png') }}" alt="Distribution Connection">
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Reset Password</p>
        <div id="alert-login"></div>

        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
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