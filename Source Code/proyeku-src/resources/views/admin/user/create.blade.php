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
		<h1>Create new user</h1>
		<div>
			{{ Form::open(array('url' => 'admin/manage/user')) }}

		    <div class="form-group">
		        {{ Form::label('name', 'Name') }}
		        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('email', 'Email') }}
		        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('password', 'Password') }}
		        {{ Form::password('password', array('class' => 'form-control')) }}
		    </div>

		    {{ Form::submit('Add user', array('class' => 'btn btn-success')) }}

		    {{ Form::close() }}
		</div>
	</div>
	@stop


</body>
</html>