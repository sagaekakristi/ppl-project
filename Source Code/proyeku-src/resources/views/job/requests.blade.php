<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

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
		@foreach($job_requests_data as $a_job_req)
		<p>
			{{ $a_job_req['job_id'] }}
			{{ $a_job_req['job_deskripsi'] }}
			{{ $a_job_req['seeker_email'] }}
		</p>
		{{ Form::open(array('action'=>'JobRequestController@acceptJob', 'method' => 'post')) }}
		{{ Form::hidden('job_id', $a_job_req['job_id']) }}
		{{ Form::hidden('seeker_id', $a_job_req['seeker_id']) }}
		{{ Form::submit('Accept this Job', array('class' => 'btn btn-success')) }}
		{{ Form::close() }}
		@endforeach
		@else
		<div class="col-md-12" style="background-color: white; height: 100px; text-align: center;">
			<br>
			<br>
			<span style="float: center; font-size: 17px;">There is no job requests to show!</span>
		</div>
		@endif
		<a class="btn btn-small btn-success" href="{{url('/show-job-accepted')}}" style="margin-bottom: 120px; margin-top: 10px;">See Accepted Job</a>
	</div>
</div>
@stop