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
		<h1>{{ $user->name }}</h1>
		<div>
			<table class="table">
				<tr>
					<td>
						Name
					</td>
					<td>
						{{$user->name}}
					</td>
				</tr>
				<tr>
					<td>
						Email
					</td>
					<td>
						{{$user->email}}
					</td>
				</tr>
				<tr>
					<td>
						Tgl lahir
					</td>
					<td>
						{{$userinfo->tanggal_lahir}}
					</td>
				</tr>
				<tr>
					<td>
						Alamat
					</td>
					<td>
						{{$userinfo->alamat}}
					</td>
				</tr>
				<tr>
					<td>
						Jenis kelamin
					</td>
					<td>	
						{{$userinfo->jenis_kelamin}}
					</td>
				</tr>
			</table>
		</div>
	</div>
	@stop


</body>
</html>