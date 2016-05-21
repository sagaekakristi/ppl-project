<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container">
	<h1 style="color: #3D566E; font-family: Titillium Web">Accepted Jobs</h1>
	<br>
	<div>
		@if($accepted_jobs != "[]")
		@foreach($accepted_jobs as $a_accepted_job)
		<p>
			{{ $a_accepted_job->job_id }}
			{{ $a_accepted_job->seeker_id }}
			{{ $a_accepted_job->waktu_mulai }}
		</p>
		@endforeach
		@else
		<div class="col-md-12" style="margin-bottom: 165px; background-color: white; height: 100px; text-align: center;">
			<br>
			<br>
			<span style="float: center; font-size: 17px;">There is no accpeted jobs to show!</span>
		</div>
		@endif
	</div>
</div>
@stop