<!-- Custom CSS -->
<link href="{{url('/assets/css/message.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<div class="container" style="margin-bottom: 80px; margin-top: 170px;"> 
	<div class="col-md-6 col-md-offset-3" style="background-color: white;"> 
		<h1>Testimoni</h1>
		{{ Form::model($accepted_job, array('action'=>'AcceptedJobController@update', 'method' => 'POST')) }}

		<div class="form-group">
			{{ Form::label('deskripsi', 'Deskripsi') }}
			{{ Form::textarea('deskripsi', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('rating', 'Rating') }}
			{{ Form::number('rating', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::hidden('id', $accepted_job->id) }}
		{{ Form::hidden('position', $position) }}
		{{ Form::submit('Send Testimoni', array('class' => 'btn btn-success')) }}
		{{ Form::close() }}
	</div>
</div>
@stop