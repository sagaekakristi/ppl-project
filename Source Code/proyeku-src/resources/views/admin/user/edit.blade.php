<link href="{{url('/assets/css/admin.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" id="body">
	<div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px;">
		<h1>Edit {{ $user->name }}</h1>
		<div>
			{{ Form::model($user, array('route' => array('admin.manage.user.update', $user->id), 'method' => 'PUT')) }}

			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', null, array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Edit user', array('class' => 'btn btn-success')) }}

			{{ Form::close() }}
		</div>
	</div>
</div>
@stop