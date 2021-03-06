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
		<div class="col-md-8 col-md-offset-2" style="background-color: white; border-radius: 10px; margin-top: 30px; margin-bottom: 30px;">
			<h1>{{ $user->name }}</h1> 
			<div> 
				<table class="table" style="font-size: 18px;"> 
					<tr> 
						<td> 
							User ID 
						</td> 
						<td> 
							{{$user->id}} 
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
	</div>
	@stop


</body>
</html>