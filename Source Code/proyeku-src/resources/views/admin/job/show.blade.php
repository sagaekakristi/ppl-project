<!DOCTYPE html>
<head>
	<link href="{{url('/assets/css/admin.css')}}" rel="stylesheet">
</head>

<body>
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
			<h1>{{$job->judul}}</h1>
			<table class="table" style="font-size: 16px;">
				<tr>
					<td>
						Job ID
					</td>
					<td>
						{{$job->id}}
					</td>
				</tr>
				<tr>
					<td>
						Freelancer
					</td>
					<td>
						{{$user->name}}
					</td>
				</tr>
				<tr>
					<td>
						Deskripsi
					</td>
					<td>
						{{$job->deskripsi}}
					</td>
				</tr>
				<tr>
					<td>
						Upah Maximum
					</td>
					<td>
						{{convertToCurrency($job->upah_max)}}
					</td>
				</tr>
				<tr>
					<td>
						Upah Minimum
					</td>
					<td>	
						{{convertToCurrency($job->upah_min)}}
					</td>
				</tr>
			</table>
		</div>
	</div>
	@stop
</body>
</html>