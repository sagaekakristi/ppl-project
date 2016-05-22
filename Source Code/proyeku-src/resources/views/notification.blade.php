<!-- Custom CSS --> 
<link href="{{url('/assets/css/notification.css')}}" rel="stylesheet"> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script> 

@extends('layouts.header') 
@section('header') 
@parent 
@stop 

@section('content') 
<div class="container" id="body" style="margin-bottom: 180px;"> 
	<div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 15px; margin-bottom: 30px;">
		<h2 style="margin-bottom: 20px;">Notification</h2>
		<hr style="width: 100%; height: 1px; background-color: #E3E7EA;">
		<ul>
			@foreach ($notification as $a_notification)
			<li>{{$a_notification->notif}}
				@endforeach
				<div class="pagination"> {{ $notification->links() }} </div>
			</li>
		</ul>
	</div> 
</div> 
@stop