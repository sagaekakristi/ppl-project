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
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit {{ $job->judul }}</h1>
			<br>
			{{ Form::model($job, array('route' => array('admin.manage.job.update', $job->id), 'method' => 'PUT')) }}

			<div class="form-group">
				{{ Form::label('judul', 'Judul') }}
				{{ Form::text('judul', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('deskripsi', 'Deskripsi') }}
				{{ Form::text('deskripsi', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('upah_max', 'Upah Maximum') }}
				{{ Form::text('upah_max', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('upah_min', 'Upah Minimum') }}
				{{ Form::text('upah_min', null, array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Edit job', array('class' => 'btn btn-success')) }}

			{{ Form::close() }}
		</div>
	</div>
	@stop


</body>
</html>