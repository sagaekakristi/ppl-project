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
        $('#skill').css('background-color', '#2ECC71');
        $('#skill').css('color', 'white');
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
            <a href="{{url('profile/edit/info')}}" class="btn btn-md btn-default">Information</a>
            @if(!empty($freelancer_info))
            <a href="{{url('profile/view/skill')}}" class="btn btn-md btn-default" id="skill">Skill</a> 
            @endif
        </div>
        <div class="col-md-12" style="padding-bottom: 30px;">
            {{Form::open(array('url' => 'profile/add/skill'))}}
            <div class="form-group">
                {{ Form::label('skill', 'New Skill') }}
                {{ Form::text('skill', Input::old('skill'), array('class' => 'form-control')) }}
            </div>
            {{Form::submit('Add skill', array('class' => 'btn btn-success')) }}
            {{Form::close()}}
        </div> 
    </div> 
</div> 
@stop