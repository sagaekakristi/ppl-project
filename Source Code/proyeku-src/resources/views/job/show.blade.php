<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<?php
//Method agar upah mudah dibaca 
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

<div class="container-fluid" style="color: #3D566E">
	<div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px;">
		<h1>Detail Job</h1>
		<br>
		<table class="table">
			<tr>
				<td>
					Judul
				</td>
				<td>
					{{$data['job_info']->judul}}
				</td>
			</tr>
			<tr>
				<td>
					Deskripsi
				</td>
				<td>
					{{$data['job_info']->deskripsi}}
				</td>
			</tr>
			<tr>
				<td>
					Upah Max.
				</td>
				<td>
					Rp {{convertToCurrency($data['job_info']->upah_max)}}
				</td>
			</tr>
			<tr>
				<td>
					Upah Min.
				</td>
				<td>
					Rp {{convertToCurrency($data['job_info']->upah_min)}}
				</td>
			</tr>
			<tr>
				<td>
					Kategori
				</td>
				<td>	
					@if(count($data['category_array']))
					@foreach ($data['category_array'] as $a_category)
					<p>{{$a_category}}</p>
					@endforeach
					@else
					<p>-</p>
					@endif
				</td>
			</tr>
		</table>

		@if(Auth::user() != null)
			@if($show_request_button == true)
				{{ Form::open(array('action'=>'JobRequestController@requestJob', 'method' => 'post')) }}
				{{ Form::hidden('job_id', $job_id) }}
				{{ Form::hidden('seeker_id', Auth::user()->id) }}
				{{ Form::submit('Request this Job!', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
			@elseif($this_is_the_owner == false)
				You have send your request for this job!
			@endif
		@else
			You need to login to request this job.
		@endif

	</div>
</div>
@stop