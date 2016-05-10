@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Proyeku</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" >
	<!-- Custom CSS -->
	<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- Logo Header -->
				<a class="navbar-brand" href="{{ url('/') }}">
					<img class="hidden-xs" src="{{url('/assets/pictures/logo-md.png')}}">
					<img class="visible-xs" src="{{url('/assets/pictures/logo-xs.png')}}" style="margin-left: -10px; margin-top: 10px"> 
				</a>
				<!-- Hamburger Button -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" style="margin-top: 35px; background-color: white;">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>

			<!-- Menu Bar -->
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-right" id="navbar" style="margin-top: 30px;">
					<!-- Authentication Links -->
					@if (Auth::guest())
					<li><a href="{{ url('/') }}" style="color: #D5EDF5;">Get Started</a></li>
					<li><a href="{{ url('/login') }}" style="color: #D5EDF5;"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
					{{--@elseif (Auth::user()->id == 2)
					<li><a href="{{ url('/logout') }}" style="background-color: #1485A3; color: #D5EDF5">Logout</a></li>
					<li><a href="{{url('/admin/manage/user')}}" style="color: #D5EDF5;">Manage User</a></li>
					<li><a href="{{url('/admin/manage/job')}}" style="color: #D5EDF5;">Manage Job</a></li>--}}
					@else
					<li class="dropdown">
						<a href="#" style="color: #D5EDF5; background-color: #1485A3;" class="dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}  <span class="caret"></span></a>
						<ul class="dropdown-menu" style="margin-top: 30px; background-color: #1485A3;">
							<li><a href="{{url('profile')}}" style="background-color: #1485A3; color: #D5EDF5;">Profile</a></li>
							<li><a href="{{url('editprofile')}}" style="background-color: #1485A3; color: #D5EDF5;">Edit Profile</a></li>
							@if(Auth::user()->name == 'Administrator')
							<li><a href="{{url('job')}}" style="background-color: #1485A3; color: #D5EDF5;">Manage Job</a></li>
							<li><a href="{{url('/admin/manage/user')}}" style="background-color: #1485A3; color: #D5EDF5;">Manage User</a></li>
							@endif
						</ul>
					</li>
					<li><a href="{{url('job/create')}}" style="color: #D5EDF5;">Open a Job</a></li>
					<li><a href="{{ url('/logout') }}" style="background-color: #1485A3; color: #D5EDF5">Logout</a></li>
					@endif
					<li>
						<form class="navbar-form" role="search" action="{{url('/searchredirect')}}">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Content -->
	@yield('content')

	<!-- JavaScripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

	@extends('layouts.footer')
	@section('footer')
	@parent
	@stop

</body>
</html>
@show
