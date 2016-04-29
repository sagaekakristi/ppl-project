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
		<div>
			<div>
				<a href="#" class="btn btn-default"><img src="{{url('/assets/pictures/add.png')}}"> Add user</a>
			</div>
			<table class="table table-hover table-condensed">
				<tr>
					<th class="admin-head">Name</th>
					<th class="admin-head">Email</th>
					<th class="admin-head"></th>
					<th class="admin-head"></th>
				</tr>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td class="icon"><a href="#"><img src="{{url('/assets/pictures/update.png')}}"></a></td>
					<td class="icon"><a href="#"><img src="{{url('/assets/pictures/remove.png')}}"></a></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	@stop


</body>
</html>