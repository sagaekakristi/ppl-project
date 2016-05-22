<link href="{{url('/assets/css/admin.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" id="body">
	<div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px;">
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

			<div class="form-group">
				{{ Form::label('tanggal_lahir', 'Tanggal Lahir') }}
				{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('alamat', 'Alamat') }}
				{{ Form::text('alamat', Input::old('alamat'), array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('jenis_kelamin', 'Jenis Kelamin') }}
				{{ Form::text('jenis_kelamin', Input::old('jenis_kelamin'), array('class' => 'form-control')) }}
			</div>

			<button type="submit" value="Add Skill" class="btn btn-success" style="border-radius: 5px;"><i class="fa fa-plus"></i> Add User</button> 

			{{ Form::close() }}
		</div>
	</div>
</div>
@stop