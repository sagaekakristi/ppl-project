<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header-profile')

@section('header')
@parent
@stop

@section('content')
<!-- Login Box -->

<div class="container" id="body">
	<div>
		<img src="{{url('/assets/pictures/profile-default-icon.png')}}">
	</div>
	<div>
		<h1>HEEEEE</h1>
		{{ $user_info->alamat }}
		{{ $user_info->tanggal_lahir }}
		{{ $user_info->jenis_kelamin }}
	</div>
</div>
@stop
