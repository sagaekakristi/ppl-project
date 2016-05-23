<!DOCTYPE html>
<head>
	<link href="{{url('/assets/css/admin.css')}}" rel="stylesheet">
</head>

<body>
	<?php
	function convertToCurrency($uang) {
		$number = (string) $uang;
		$numberLength = strlen($number);
		$numberArray = array();
		$currencyArray = array();
		$currency = "";
		for($i = 0; $i < $numberLength; $i++) {
			array_push($numberArray, $number[$i]);
		}

		$j = $numberLength-1;
		$k = $numberLength-1;
		for($i = 0; $i <= $j; $i++) {
			$currencyArray[$i] = $numberArray[$k];
			$k--;
		}

		$count = 0;
		for($i = 0; $i < sizeof($currencyArray); $i++) {
			if(($count % 3 == 0) && ($count != 0)) {
				$currency = $currency . ".";
			}
			$currency = $currency . $currencyArray[$i];
			$count++;
		}
		return strrev($currency);
	}
	?>
	@extends('layouts.header')
	@section('header')
	@parent
	@stop

	@section('content')
	<div class="container-fluid" id="body">
		<h1 style="font-family: Titillium Web;">List of All Jobs</h1>
		@if(count($jobs) > 0)
		<div>
			<table class="table table-hover">
				<tr>
					<th class="admin-head">Job ID</th>
					<th class="admin-head">Freelancer</th>
					<th class="admin-head">Judul</th>
					<th class="admin-head">Deskripsi</th>
					<th class="admin-head">Upah Max</th>
					<th class="admin-head">Upah Min</th>
					<th class="admin-head"></th>
					<th class="admin-head"></th>
				</tr>
				@foreach ($jobs as $job)
				<tr>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->id }}</a></td>
					@foreach ($users as $user)
					@if($user->id == $job->freelancer_info_id)
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $user->name }}</a></td>
					@endif
					@endforeach
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->judul }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->deskripsi }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">Rp {{ convertToCurrency($job->upah_max) }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">Rp {{ convertToCurrency($job->upah_min) }}</a></td>
					<td class="icon"><a href="/admin/manage/job/{{ $job->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a></td>
					<td class="icon">{{ Form::open(['url' => '/admin/manage/job/' . $job->id, 'method' => 'DELETE']) }}
						{{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm("Are you sure want to delete this job?")'])}}
						{{ Form::close() }}</td>
					</tr>
					@endforeach
				</table>
				<div>
					<a href="/admin/manage/job/create" class="btn btn-success"><i class="fa fa-plus"></i> Add job</a>
				</div>
				<div class="pagination"> {{ $jobs->links() }} </div>
			</div>
			@else
			<div class="col-md-12" style="background-color: white; height: 100px; text-align: center; margin-bottom: 10px;">
				<br>
				<br>
				<span style="float: center; font-size: 17px;">No user has create a job</span>
			</div>
			@endif
		</div>
		@stop
	</body>
	</html>