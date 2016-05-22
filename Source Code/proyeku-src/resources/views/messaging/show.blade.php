<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" id="body">
	<h1 style="color: #3D566E; font-family: Titillium Web">Messages</h1>
	<br>
	<div>
		@foreach($messages as $a_message)
		@if($a_message->sender_user_id == Auth::user()->id)
		<div class="col-md-12">
			<div class="col-md-6" style="float: left; background-color: white; border-radius: 10px; margin-bottom: 5px;">
				<h3> You </h3>
				<?php 
				$time = $a_message->created_at;
				$arrayTime = (explode(' ', $time, 2));
				echo $arrayTime[0].', ';
				?>

				<?php
				echo $arrayTime[1];
				?>
				<hr style="width: 100%; height: 1px; background-color: #E3E7EA;">

				<p style="font-size: 17px;">{{ $a_message->message_content }}</p>
				<br>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<div class="col-md-6" style="float: right; background-color: white; border-radius: 10px; margin-bottom: 5px;">
				<h3> {{ $sender_name }}</h3>
				<?php 
				$time = $a_message->created_at;
				$arrayTime = (explode(' ', $time, 2));
				echo $arrayTime[0].', ';
				?>

				<?php
				echo $arrayTime[1];
				?>
				<hr style="width: 100%; height: 1px; background-color: #E3E7EA;">

				<p style="font-size: 17px;">{{ $a_message->message_content }}</p>
				<br>
			</div>
		</div>
		@endif
		@endforeach

		{{ Form::open(array('url' => 'message')) }}
		{{ Form::hidden('to_id', $sender_user_id) }}
		{{ Form::hidden('from_id', Auth::user()->id) }}
		<div class="form-group">
			{{ Form::textarea('message', Input::old('message'), array('class' => 'form-control', 'placeholder' => 'Reply here...', 'style' => 'height: 100px; margin-bottom: 5px;')) }}
			{{ Form::submit('Send!', array('class' => 'btn btn-success')) }}
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop