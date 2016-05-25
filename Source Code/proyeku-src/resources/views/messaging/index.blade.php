<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" style="margin-bottom: 160px;">
	<h1 style="color: #3D566E; font-family: Titillium Web">Messages</h1>
	<br>
	<div>
		@if(count($messages) > 0)
		<table class="table"> 
			<tr> 
				<th>From</th> 
				<th>Message</th> 
				<th>Date</th> 
				<th>Time</th> 
				<th></th> 
			</tr> 
			@foreach($messages as $a_message) 
			<tr> 
				<td> 
					{{ $a_message->name }}</a> 
				</td> 
				<td> 
					{{ $a_message->message_content }} 
				</td> 
				<td> 
					<?php  
					$time = $a_message->created_at; 
					$arrayTime = (explode(' ', $time, 2)); 
					echo $arrayTime[0] 
					?> 
				</td> 
				<td> 
					<?php 
					echo $arrayTime[1]; 
					?> 
				</td> 
				<td> 
					<a type="button" href="{{ URL::to('message/' . $a_message->sender_user_id) }}" class="btn btn-success">View Conversation</a> 
				</td> 
			</tr> 
			@endforeach 
		</table> 
		@else
		<div class="col-md-12" style="margin-bottom: 130px; background-color: white; height: 100px; text-align: center;">
			<br>
			<br>
			<span style="float: center; font-size: 17px;">There is no messages to show!</span>
		</div>
		@endif
	</div>
</div>
@stop