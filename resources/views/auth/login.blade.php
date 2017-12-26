@extends('layouts.auth')
@section('title') Login @endsection
@section('content')

<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="{{ url('/admin') }}" class="logo">
                <img src="{{ theme('images/logo.png') }}" width="190" alt="" />
            </a>
            
            <p class="description">{{ trans('lang.login') }}</p>
            
        </div>
        
    </div>
    
    <div class="login-progressbar">
        <div></div>
    </div>
    
    <div class="login-form">
        <div class="login-content">
            
            <form class="form-horizontal" dir="{{ getDir() }}" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group"{{ $errors->first('email') }}>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input id="email" type="email" class="form-control" placeholder="{{ trans('lang.email') }}" name="email" value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block" style="margin-left:-85px;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group"{{ $errors->first('password') }}>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        
                        <input type="password" class="form-control" name="password" id="password" placeholder="{{ trans('lang.password') }}" autocomplete="off" />
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block" style="margin-left:-65px;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        {{ trans('lang.enter') }}
                    </button>
                </div>

                <div class="form-group">
                    <div class="">
                        <div class="checkbox">
                            <label>
                                 <input type="checkbox" name="remember" value="1"> {{ trans('lang.remember') }}   
                                 | <a class="link" href="{{ url('/password/reset') }}">{{ trans('lang.no_worries') }} {{ trans('lang.to_reset_your_password') }}</a>  
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 
               
                <div class="form-group">
                    <em>- or -</em>
                </div>


                
                <div class="form-group">
                
                    <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
                        Login with Facebook
                        <i class="entypo-facebook"></i>
                    </button>
                    
                </div>
                
                
                
                You can also use other social network buttons
                <div class="form-group">
                
                    <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
                        Login with Twitter
                        <i class="entypo-twitter"></i>
                    </button>
                    
                </div>
                
                <div class="form-group">
                
                    <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
                        Login with Google+
                        <i class="entypo-gplus"></i>
                    </button>
                    
                </div> -->
                
            </form>
            
              
            </div>
            
        </div>
        
    </div>
    
</div>


@endsection()





