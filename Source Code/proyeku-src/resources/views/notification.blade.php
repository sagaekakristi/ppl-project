<!-- Custom CSS --> 
<link href="{{url('/assets/css/notification.css')}}" rel="stylesheet"> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script> 

@extends('layouts.header') 
@section('header') 
@parent 
@stop 

@section('content') 
<div class="container" id="body"> 
    <div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 15px; margin-bottom: 30px; padding-bottom: 30px; padding-top: 20px;">
        <h2 style="margin-bottom: 20px;">Notification</h2> 
        <ul>
        @foreach ($notification as $a_notification)
            <li>{{$a_notification->notif}}
        @endforeach
        </ul>
    </div> 
</div> 
@stop