<title>Login</title>

<!-- Custom CSS -->
<link href="{{url('/assets/css/login.css')}}" rel="stylesheet">
@extends('layouts.master-header')
@section('header')
@parent
@stop

@section('content')
<!-- Login Box -->
<div class="container">
    <div class="col-md-12">
        <div class="col-md-4 col-md-offset-4" id="login-div">
            <p class="visible-xs" style="font-size: 40px;">Sign In</p>
            <p class="hidden-xs" style="">Sign In</p>
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="col-md-3 hidden-xs" style="font-size: 20px; float: left;">Email/Username</span>
                    <span class="col-md-3 visible-xs" style="font-size: 15px; float: left;">Email/Username</span>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="example@example@gmail.com" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="col-md-2 hidden-xs" style="font-size: 20px; float: left;">Password</span>
                    <span class="col-md-2 visible-xs" style="font-size: 15px; float: left;">Password</span>
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                
                <table align="center" class="hidden-xs" style="margin-top: 30px;">
                    <tr>
                        <td style="padding-right: 10px;">
                            <input type="submit" value="Login" id="submit">
                        </td>
                        <td>
                            <input type="checkbox"  value="Remember Me"><span style="font-size: 13px;">RememberMe</span>
                        </td>
                        <td>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}"><span style="font-size: 13px;">Forgot Password?</span></a>
                        </td>
                    </tr>
                </table>

                <table align="center" class="visible-xs">
                    <tr>
                        <td>
                            <input type="submit" value="Login" id="submit" style="height: 30px; width: 80px; font-size: 13px;">
                        </td>
                        <td>
                            <input  type="checkbox" value="Remember Me"><span style="font-size: 13px;">RememberMe</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}" style="margin-left: -10px;"><span style="font-size: 13px;">Forgot Password?</span></a>
                        </td>
                    </tr>
                </table>
            </form>
            <p style="font-family: Titillium Web; font-size: 20px;"><strong>Or</strong></p>
            <form action="{{url('register')}}">
                <input type="submit" value="Sign Up" style="background-color: #F26151;">
            </form>
        </div>
    </div>
</div>
@stop

@extends('layouts.master-footer')

@section('footer')
@parent
@stop