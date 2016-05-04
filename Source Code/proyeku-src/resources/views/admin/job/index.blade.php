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
				<a href="/admin/manage/job/create" class="btn btn-success">Add job</a>
			</div>
			<table class="table table-hover table-condensed">
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
				@foreach ($users as $user)
				@foreach ($jobs as $job)
				<tr>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->id }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $user->name }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->judul }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->deskripsi }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->upah_max }}</a></td>
					<td><a href="/admin/manage/job/{{ $job->id }}">{{ $job->upah_min }}</a></td>
					<td class="icon"><a href="/admin/manage/job/{{ $job->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a></td>
					<td class="icon">{{ Form::open(['url' => '/admin/manage/job/' . $job->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}</td>
				</tr>
				@endforeach
				@endforeach
			</table>
		</div>
	</div>
	@stop


</body>
</html>