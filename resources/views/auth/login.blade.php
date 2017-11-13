@extends('layouts.blank', array('title'=>'Login', 'body_class'=>'login-page'))

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('logo/logo-sm.png') }}" alt="Distribution Connection">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') || $errors->has('active') ? ' has-error' : '' }} has-feedback">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email') || $errors->has('active'))
                        <span class="help-block">
                            <strong>{{ $errors->has('email') ? $errors->first('email') : $errors->first('active') }}</strong>
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
                <div class="row">
                    <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!--<div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
            </div>-->
            <!-- /.social-auth-links -->

            <div class="text-center link-footer">
                <a href="{{ route('password.request') }}">I forgot my password</a><br>
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
        });
    });
    </script>
@endsection