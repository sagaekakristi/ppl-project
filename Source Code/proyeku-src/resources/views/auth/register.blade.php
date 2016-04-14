<title>Sign Up</title>

<!-- Custom CSS -->
<link href="{{url('/assets/css/register.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<!-- Register Box --> 
<div class="container">
    <div class="col-md-4 col-md-offset-4" id="register-div">
        <table>
            <tr>
                <td>
                    <p class="visible-xs" style="font-size: 40px; margin-top: 20px; margin-left: 10px;">Sign Up</p>
                    <p class="hidden-xs" style="margin-top: 20px; margin-left: 12px;">Sign Up</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="hidden-xs" style="margin-left: 12px; font-size: 22px; font-family: Titillium Web;">It's Free and Forever Ever After</p>
                    <p class="visible-xs" style="margin-left: 12px; font-size: 15px; font-family: Titillium Web;">It's Free and Forever Ever After</p>
                </td>
            </tr>
        </table>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}
                <div>

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">    
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

                        @if ($errors->has('name'))
                        <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">

                    @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Reenter Password">

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" value="Sign Up" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>
@stop