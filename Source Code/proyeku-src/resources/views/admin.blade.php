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
				<a href="/admin/create" class="btn btn-success">Add user</a>
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
					<td class="icon"><a href="/admin/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a></td>
					<td class="icon">{{ Form::open(['url' => '/admin/' . $user->id . '/delete', 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	@stop


</body>
</html>