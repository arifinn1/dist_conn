@extends('layouts.blank', array('title'=>'Register', 'body_class'=>'register-page'))

@section('content')
<div class="register-box">
    <div class="register-logo">
        <img src="{{ asset('logo/logo-sm.png') }}" alt="Distribution Connection">
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <div id="alert-login"></div>

        <form method="POST" action="{{ route('register') }}" onsubmit="return check_input()">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('store_name') ? ' has-error' : '' }} has-feedback">
                <input id="store_name" type="text" class="form-control" placeholder="Store" name="store_name" value="{{ old('store_name') }}" required>
                <span class="glyphicon glyphicon-flag form-control-feedback"></span>
                @if ($errors->has('store_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('store_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} has-feedback">
                <textarea id="address" type="text" class="form-control" placeholder="Address" name="address" required>{{ old('address') }}</textarea>
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} has-feedback">
                <select id="title" class="form-control" name="title">
                    <option value="Mr" {{ old('title')==='Mr' ? 'selected': '' }}>Mr</option>
                    <option value="Ms" {{ old('title')==='Ms' ? 'selected': '' }}>Ms</option>
                    <option value="Miss" {{ old('title')==='Miss' ? 'selected': '' }}>Miss</option>
                    <option value="Mrs" {{ old('title')==='Mrs' ? 'selected': '' }}>Mrs</option>
                </select>
                <i class="fa fa-venus-mars form-control-feedback" aria-hidden="true"></i>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                <input id="name" type="text" class="form-control" placeholder="Owner" name="name" value="{{ old('name') }}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
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
                <div id="help-block-password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                    <input id="agreement" type="checkbox" {{ old('email')!='' ? 'checked' : '' }}> I agree to the <a href="#">terms</a>
                    </label>
                    <div id="help-block-agreement">
                    </div>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!--<div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
            Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
            Google+</a>
        </div>-->

        <div class="text-center link-footer">
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
        });
    });

    var checked = false;

    function check_input(){
        if($("#agreement:checked").val()){
            var pass1 = $('#password').val(), pass2 = $('#password-confirm').val();
            if(pass1 === pass2){
                $('#alert-login').hide();
                return true;
            }else{
                ShowAlert('#alert-login', 'Retype you password, they do not match', 'warning');
                return false;
            }
        }else{
            ShowAlert('#alert-login', 'You cannot register as new member without approving our term', 'warning');
            return false;
        }
    }
</script>
@endsection