<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')


<div class="container" style="margin-bottom: 30px;">
	<h1 style="color: #3D566E; font-family: Titillium Web">Accepted Jobs</h1>
	<br>
	<div>
		@if(count($accepted_jobs) > 0)
		<table class="table"> 
			<tr> 
				<th>Job Id</th> 
				<th>From</th> 
				<th>Accepted Date</th> 
				<th>Accepted Time</th> 
				<th></th>
			</tr> 
			@foreach($accepted_jobs as $a_accepted_job) 
			<tr> 
				<td>{{ $a_accepted_job->job_id }}</td>
				<td>
					<?php $user = App\User::where('id', $a_accepted_job->seeker_id)->get()->first(); 
					echo $user['name'];
					?>

				</td> 
				<td> 
					<?php  
					$time = $a_accepted_job->waktu_mulai; 
					$arrayTime = (explode(' ', $time, 2)); 
					echo $arrayTime[0]; 
					?> 
				</td> 
				<td> 
					<?php 
					echo $arrayTime[1]; 
					?> 
				</td>
				<td><a type="button" class="btn btn-success" href="{{url('freelancer/accepted/'.$a_accepted_job->id)}}">View</a></td>
			</tr> 
			@endforeach 
		</table> 
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