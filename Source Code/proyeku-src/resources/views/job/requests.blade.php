<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container">
	<h1 style="color: #3D566E; font-family: Titillium Web">Job Request</h1>
	<br>
	<div>
		@if(count($job_requests_data) > 0)
		<table class="table"> 
			<tr> 
				<th>Job Id</th> 
				<th>Deskripsi</th> 
				<th>From</th> 
				<th></th> 
			</tr> 
			@foreach($job_requests_data as $a_job_req) 
			<tr> 
				<td>{{ $a_job_req['job_id'] }}</td> 
				<td>{{ $a_job_req['job_deskripsi'] }}</td> 
				<td>{{ $a_job_req['seeker_email'] }}</td> 
				{{ Form::open(array('action'=>'JobRequestController@acceptJob', 'method' => 'post')) }} 
				{{ Form::hidden('job_id', $a_job_req['job_id']) }} 
				{{ Form::hidden('seeker_id', $a_job_req['seeker_id']) }} 
				<td>{{ Form::submit('Accept this Job', array('class' => 'btn btn-success')) }}</td> 
				{{ Form::close() }} 
			</tr> 
			@endforeach 
		</table> 
		@else
		<div class="col-md-12" style="background-color: white; height: 100px; text-align: center;">
			<br>
			<br>
			<span style="float: center; font-size: 17px;">There is no job requests to show!</span>
		</div>
		@endif
		<a type="button" class="btn btn-small btn-success" href="{{url('/freelancer/accepted')}}" style="margin-bottom: 120px; margin-top: 10px;">See Accepted Job as Freelancer</a>
		<a type="button" class="btn btn-small btn-success" href="{{url('/seeker/accepted')}}" style="margin-bottom: 120px; margin-top: 10px;">See Accepted Job as Seeker</a>
	</div>
</div>
@stop