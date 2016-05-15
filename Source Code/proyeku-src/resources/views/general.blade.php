<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<script>
  $(document).ready(function() {
    $('#on').click(function() {
        $(this).css('background-color', '#2ECC71');
        $(this).css('color', 'white');
        $('#off').css('background-color', 'white');
        $('#off').css('color', 'black');
    });
    $('#off').click(function() {
        $(this).css('background-color', '#E74C3C');
        $(this).css('color', 'white');
        $('#on').css('background-color', 'white');
        $('#on').css('color', 'black');
    });
});
</script>

<div class="container" id="body">
    <div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px; padding-bottom: 30px;">
        <h2>Edit Profile</h2>
        <!--<div class="btn-group btn-toggle"> 
            <button class="btn btn-sm btn-default" id="on">ON</button>
            <button class="btn btn-sm btn-default" id="off">OFF</button>
        </div>-->
        <br>
        <div> 
            <a href="{{url('profile/edit/general')}}" class="btn btn-md btn-default">General</a>
            <a href="{{url('profile/edit/info')}}" class="btn btn-md btn-default">Info</a>
        </div>


        <div style="margin-top: 20px;">
            <div class="col-md-6">
                {{-- Form::model($user, array('route' => array('profile', $user->id), 'files' => true, 'method' => 'PUT')) --}}
                {{ Form::model($user, array('action'=>'ProfilePageController@updateGeneral', $user->id, 'files'=>true, 'method' => 'PUT')) }}
                <div class="form-group">
                    {!! Form::label('Avatar') !!}
                    {!! Form::file('image', null) !!}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::text('password', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                {{ Form::close() }}
            </div>
            <div class="col-md-6">
                <img src="{{url('/assets/pictures/profile-default-icon.png')}}">
            </div>
        </div>
    </div>
</div>
@stop