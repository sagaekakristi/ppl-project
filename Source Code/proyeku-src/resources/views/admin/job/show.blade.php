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
	<div class="container" id="body">
		<h1>{{ $job->judul }}</h1>
		<div>
			<table class="table">
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
						{{$job->upah_max}}
					</td>
				</tr>
				<tr>
					<td>
						Upah Minimum
					</td>
					<td>	
						{{$job->upah_min}}
					</td>
				</tr>
			</table>
		</div>
	</div>
	@stop


</body>
</html>