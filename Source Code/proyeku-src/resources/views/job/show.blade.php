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
					Freelancer name
				</td>
				<td>
					<?php
					$user = App\User::where('id', $data['job_info']->freelancer_info_id)->get()->first();
					echo $user['name'];
					?>
				</td>
			</tr>
			<tr>
				<td>
					Job Name
				</td>
				<td>
					{{$data['job_info']->judul}}
				</td>
			</tr>
			<tr>
				<td>
					Description
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
					Category
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

		<div class="col-md-10 col-md-offset-1" style="text-align: center; margin-bottom: 20px;">
			@if(Auth::user() != null)
			@if($show_request_button == true)
			{{ Form::open(array('action'=>'JobRequestController@requestJob', 'method' => 'post')) }}
			{{ Form::hidden('job_id', $job_id) }}
			{{ Form::hidden('seeker_id', Auth::user()->id) }}

			{{ Form::textarea('message', Input::old('deskripsi'), array('class' => 'form-control', 'placeholder' => 'Write additional message here... (optional)', 'style' => 'height: 100px;')) }}
			<br>
			<button class="btn btn-success" type="submit" style="border-radius: 5px;">Request Job</button>
			{{ Form::close() }}
			@elseif($this_is_the_owner == false)
			You have send your request for this job!
			@endif
			@else
			<h5>You have to login to request this job</h5>
			<a type="button" href="{{ url('/login') }}" style="color: #D5EDF5;" class="btn btn-success"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
			@endif
		</div>
	</div>
</div>
@stop