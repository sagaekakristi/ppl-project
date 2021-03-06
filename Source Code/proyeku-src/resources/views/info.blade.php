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
        $('#info').css('background-color', '#2ECC71');
        $('#info').css('color', 'white');
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
    <div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 15px; margin-bottom: 30px; padding-top: 20px;">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Edit Profile</h2> 
        <br>
        <div>  
            <a href="{{url('profile/edit/account')}}" class="btn btn-md btn-default">Account</a> 
            <a href="{{url('profile/edit/info')}}" class="btn btn-md btn-default" id="info">Information</a>
            @if(!empty($freelancer_info))
            <a href="{{url('profile/view/skill')}}" class="btn btn-md btn-default">Skill</a> 
            @endif
        </div>

        <div class="col-md-12" style="padding-bottom: 30px;"> 
            {{ Form::model($user_info, array('action'=>'ProfilePageController@updateInfo', $user_info->id, 'method' => 'PUT')) }} 

            <div class="form-group"> 
                {{ Form::label('alamat', 'Alamat') }} 
                {{ Form::text('alamat', null, array('placeholder'=>'Alamat, Kota, Provinsi', 'class' => 'form-control')) }} 
            </div> 

            <div class="form-group"> 
                {{ Form::label('jenis_kelamin', 'Jenis Kelamin') }}
                <br>
                {{ Form::select('jenis_kelamin', array('L' => 'Laki-Laki', 'P' => 'Perempuan')) }}
            </div> 

            <div class="form-group">
                {{ Form::label('tanggal_lahir', 'Tanggal Lahir') }} 
                {{ Form::text('tanggal_lahir', null, array('placeholder'=>'YYYY-MM-DD', 'class' => 'form-control')) }}
            </div> 

            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
            {{ Form::close() }} 
        </div> 
    </div> 
</div> 
@stop