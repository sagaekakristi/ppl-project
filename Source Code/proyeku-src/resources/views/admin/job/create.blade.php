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
		<h1>Create new job</h1>
		<div>
			{{ Form::open(array('url' => 'admin/manage/job')) }}

		    <div class="form-group">
		        {{ Form::label('freelancer_id', 'User ID') }}
		        {{ Form::text('freelancer_id', Input::old('freelancer_id'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('judul', 'Judul') }}
		        {{ Form::text('judul', Input::old('judul'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('deskripsi', 'Deskripsi') }}
		        {{ Form::text('deskripsi', Input::old('deskripsi'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('upah_max', 'Upah Maximum') }}
		        {{ Form::text('upah_max', Input::old('upah_max'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('upah_min', 'Upah Minimum') }}
		        {{ Form::text('upah_min', Input::old('upah_min'), array('class' => 'form-control')) }}
		    </div>

		    {{ Form::submit('Add job', array('class' => 'btn btn-success')) }}

		    {{ Form::close() }}
		</div>
	</div>
	@stop


</body>
</html>