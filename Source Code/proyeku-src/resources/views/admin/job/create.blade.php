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
		<div class="col-md-6 col-md-offset-3" style="background-color: white;"> 
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

				<button type="submit" value="Add Skill" class="btn btn-success" style="border-radius: 5px; margin-bottom: 10px;"><i class="fa fa-plus"></i> Add Job</button> 

				{{ Form::close() }} 
			</div> 
		</div>
		@stop


	</body>
	</html>