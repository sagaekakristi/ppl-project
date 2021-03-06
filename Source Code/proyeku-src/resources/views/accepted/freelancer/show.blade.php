<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<?php
$user = App\User::where('id', $accepted_job->seeker_id)->get()->first();
$job = App\Job::where('id', $accepted_job->job_id)->get()->first();
?>

<div class="container" style="margin-bottom: 170px;">
	<h1>Job Detail</h1>
	<table class="table">
		<tr>
			<th>Seeker</th>
			<th>Job Id</th>
			<th>Job Name</th>
			<th>Job Description</th>
			<th>Start Date</th>
			<th>Start time</th>
			<th></th>
		</tr>
		<tr>
			<td>{{ $user['name'] }}</td>
			<td>{{ $accepted_job->job_id }}</td>
			<td>{{ $job['judul'] }}</td>
			<td>{{ $job['deskripsi'] }}</td>
			<td> 
				<?php  
				$time = $accepted_job->waktu_mulai; 
				$arrayTime = (explode(' ', $time, 2)); 
				echo $arrayTime[0]; 
				?> 
			</td> 
			<td> 
				<?php 
				echo $arrayTime[1]; 
				?> 
			</td>
			{{ Form::open(array('action'=>'AcceptedJobController@freelancerRequestDone', 'method' => 'post')) }}
			{{ Form::hidden('accepted_job_id', $accepted_job->id) }}
			<td>
				@if(($accepted_job->freelancer_confirm_done) != 1)
				{{ Form::submit('Sign the job as finished', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
				@else
				<a href="#" class="btn btn-default">Job has been done</a>
				{{ Form::close() }}
				@endif
			</td>
		</tr>
	</table>
</div>
@stop