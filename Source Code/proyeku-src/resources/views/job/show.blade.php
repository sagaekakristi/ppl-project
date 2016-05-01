<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container-fluid" style="color: #3D566E">
<h1>Detail Job</h1>
<br>
<table class="table">
	<tr>
		<td>
			Judul
		</td>
		<td>
			{{$data['job_info']->judul}}
		</td>
	</tr>
	<tr>
		<td>
			Deskripsi
		</td>
		<td>
			{{$data['job_info']->deskripsi}}
		</td>
	</tr>
	<tr>
		<td>
			Upah Max.
		</td>
		<td>
			{{$data['job_info']->upah_max}}
		</td>
	</tr>
	<tr>
		<td>
			Upah Min.
		</td>
		<td>
			{{$data['job_info']->upah_min}}
		</td>
	</tr>
	<tr>
		<td>
			Kategori
		</td>
		<td>	
			@if(count($data['category_array']))
				@foreach ($data['category_array'] as $a_category)
					<p>{{$a_category}}</p>
				@endforeach
			@else
				<p>-</p>
			@endif
		</td>
	</tr>
</table>
</div>
@stop