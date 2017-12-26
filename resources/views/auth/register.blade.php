@extends('layouts.auth')
@section('title') Regestration @endsection
@section('content')

<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="index.html" class="logo">
                <img src="{{ theme('images/logo.png') }}" width="190" alt="" />
            </a>
            
            <p class="">Create an account, it's free and takes few moments only!</p>
            
            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>
        
    </div>

<div class="login-form">
    <div class="login-content">
        <form  class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group"{{ $errors->has('name') ? ' has-error' : '' }}>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input placeholder="Full name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block" style="margin-left:-85px;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group"{{ $errors->has('email') ? ' has-error' : '' }}>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input placeholder="Email Address" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block" style="margin-left:-85px;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group"{{ $errors->has('phone') ? ' has-error' : '' }}>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input placeholder="Phone Number" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block" style="margin-left:-85px;">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group"{{ $errors->has('password') ? ' has-error' : '' }}>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-lock"></i>
                                </div>
                                <input placeholder="Password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block" style="margin-left:-85px;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group"{{ $errors->has('password_confirmation') ? ' has-error' : '' }}>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-lock"></i>
                                </div>
                                <input placeholder="Password Confirmation" type="password" class="form-control" name="password_confirmation">
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block" style="margin-left:-85px;">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                {{ trans('lang.enter') }}
                            </button>
                        </div>
        </form>
    </div>
</div>



@endsection