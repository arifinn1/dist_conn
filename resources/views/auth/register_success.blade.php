@extends('layouts.blank', array('title'=>'Register Success', 'body_class'=>'register-page'))

@section('content')
<div class="register-box">
    <div class="register-logo">
        <img src="{{ asset('logo/logo-sm.png') }}" alt="Distribution Connection">
    </div>

    <div class="register-box-body">
        <p class="text-center text-success">
        <i class="fa fa-4x fa-check-circle" aria-hidden="true" style="padding-top: 8px;"></i></br>
        Registration Success</p>
        <p class="login-box-msg">
        Thank you {{ $title.' '.$name }} for trusting us as your partner, we will inform you by email when your account is ready.
        </p>
        <div class="text-center link-footer">
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
@endsection