<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" style="margin-bottom: 30px;">
	<h1 style="color: #3D566E; font-family: Titillium Web">Messages</h1>
	<br>
	<div>
		@if($messages != "[]")
		@foreach($messages as $a_message)
		<p>
			<a href="{{ URL::to('message/' . $a_message->sender_user_id) }}">{{ $a_message->sender_user_id }}</a>
			{{ $a_message->message_content }}
			{{ $a_message->created_at }}
		</p>
		@endforeach
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