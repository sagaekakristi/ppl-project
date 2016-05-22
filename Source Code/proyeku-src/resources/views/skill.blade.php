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
        <div style="margin-bottom: 20px;">  
            <a href="{{url('profile/edit/account')}}" class="btn btn-md btn-default">Account</a> 
            <a href="{{url('profile/edit/info')}}" class="btn btn-md btn-default">Information</a>
            @if(!empty($freelancer_info))
            <a href="{{url('profile/view/skill')}}" class="btn btn-md btn-default" id="skill">Skill</a> 
            @endif
        </div>
        <div class="col-md-12" style="padding-bottom: 30px;">
            @if(count($skills) > 0)
            <h3>Your Skills</h3>
            <hr style="width: 100%; height: 1px; background-color: #E3E7EA;">
            <table class="table-condensed" style="margin: 0 auto;">
                @foreach($skills as $skill)
                <tr>
                    <td width="350px">
                        {{ $skill->skill }}
                    </td>
                    {{ Form::open(array('action'=>'ProfilePageController@deleteSkill', 'method' => 'post')) }}
                    {{ Form::hidden('freelancer_id', $user_info->user_id) }}
                    {{ Form::hidden('skill', $skill->skill) }}
                    <td>
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'onclick'=>'return confirm("Are you sure want to delete this skill?")')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="col-md-12" style="background-color: white; height: 100px; text-align: center;">
                <br>
                <h4 style="float: center;">You have not add any skill!</h4>
            </div>
            @endif
            <br>
            <a type="button" class="btn btn-success" href="{{url('profile/create/skill')}}"><i class="fa fa-plus"></i> Add skill</a>
        </div> 
    </div> 
</div> 
@stop