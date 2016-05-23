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
        $('#account').css('background-color', '#2ECC71');
        $('#account').css('color', 'white');
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
    <div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 15px; margin-bottom: 30px; padding-bottom: 30px; padding-top: 20px;">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2 style="margin-bottom: 20px;">Edit Profile</h2> 

        <div style="margin-bottom: 20px;">  
            <a href="{{url('profile/edit/account')}}" class="btn btn-md btn-default" id="account">Account</a> 
            <a href="{{url('profile/edit/info')}}" class="btn btn-md btn-default">Information</a>
            @if(!empty($freelancer_info))
            <a href="{{url('profile/view/skill')}}" class="btn btn-md btn-default">Skill</a> 
            @endif
        </div> 

        <div class="col-md-12 hidden-xs" style="float: right; margin-bottom: 20px;"> 
            <?php $picture = $user->id . '.jpg';?>
            @if (file_exists(public_path('/upload/'.$picture)))
            <img src="{{url('/upload/'.$picture)}}" class="img-circle" style="height: 200px; width: 200px;">
            @else
            <img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="img-circle" style="height: 200px; width: 200px;">
            @endif
        </div>
        <div class="visible-xs" style="float: center; margin-bottom: 20px;"> 
            <?php $picture = $user->id . '.jpg';?>
            @if (file_exists(public_path('/upload/'.$picture)))
            <img src="{{url('/upload/'.$picture)}}" class="img-circle" style="height: 200px; width: 200px;">
            @else
            <img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="img-circle" style="height: 150px; width: 150px;">
            @endif
        </div>

        <!-- UPLOAD PHOTO -->
        <div class="col-md-12" style="margin-bottom: 20px;">
            {{ Form::model($user, array('enctype'=>'multipart/form-data', 'action'=>'ProfilePageController@upload','files'=>true, 'method' => 'PUT')) }}
            <div class="col-md-12">
                {{ Form::file('image', array('class' => '')) }}
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                {{ Form::submit('Update', array('class' => 'btn btn-xs btn-success')) }}
            </div> 
            {{ Form::close() }} 
        </div>

        <!-- UPDATE ACCOUNT -->
        <div class="col-md-12" style="margin-top: 20px;">
            {{ Form::model($user, array('enctype'=>'multipart/form-data', 'action'=>'ProfilePageController@updateAccount', $user->id, 'files'=>true, 'method' => 'PUT')) }}

            <div class="form-group"> 
                {{ Form::label('email', 'Email') }} 
                {{ Form::text('email', null, array('class' => 'form-control')) }} 
            </div> 

            <div class="form-group"> 
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' )) }} 
            </div> 

            <div class="form-group"> 
                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password', 'class'=>'form-control' )) }} 
            </div> 

            {{ Form::submit('Update', array('class' => 'btn btn-success')) }} 
            {{ Form::close() }} 
        </div> 
    </div> 
</div> 
@stop