<!-- Custom CSS -->
<link href="{{url('/assets/css/welcome.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<!-- Body -->
<div class="container-fluid" id="body1">
	<div class="row">
		<div class="col-md-12" style="margin-top: 140px;">
			<p id="moto">Synergize efficiently!</p>
		</div>
		<form class="col-md-6 col-md-offset-3" role="search" style="margin-bottom: 170px;" action="{{url('/search')}}">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search" style="height: 40px;" name="search">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit" style="background-color: #F26151; color: white; height: 40px;"><strong>Cari Freelancer</strong></button>
				</div>
			</div>
		</form>
	</div>
</div>
<section id="feature-section">
	<div class="container text-center">
		<div class="row topspace">
			<div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12">
				<p class="blenda35">
					Get amazing results working<br>
					with a great talent
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 col-md-offset-7 col-sm-5 col-sm-offset-7 col-xs-12">
				<p class="blenda35">
					Get a list of skilled<br>
					freelancers instantly
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12">
				<p class="blenda35">
					Collaborate in a secure<br>
					online workplace
				</p>
			</div>
		</div>
	</div>
	<section>
	<span class="miring1"></span>
	</section>
</section>
<section id="choose-section">
	<div class="container text-center">
		<div class="row topspace">
			<div class="col-md-12">
				<p class="blenda45">
					Choose Your Side!
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<p class="blenda35">
					Freelancer
				</p>
				<p>
					Seseorang yang memiliki kemampuan spesial. Kebanyakan dari Freelancer memiliki spesialisasi dalam bidang web development, application development, game development, graphic design, video editing, ataupun hal-hal lain yang mungkin hanya mereka yang tahu. Mereka membutuhkan Seeker untuk tetap menjaga kemampuan tersebut dan mempertahankan kehidupan di bumi.
				</p>
				<form action="{{url('register')}}">
					<input type="submit" value="Join Freelancer" style="background-color: #F26151;">
				</form>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<p class="blenda35">
					Seeker
				</p>
				<p>
					Seseorang yang harus menyelesaikan sebuah misi rahasia. Misi tersebut sangat sulit diselesaikan karena membutuhkan kemampuan spesial. Dikarenakan hal tersebut, Seeker akan mencari dan menemukan seorang Freelancer untuk menyelesaikan misi tersebut dan mempertahankan kehidupan di bumi.
				</p>
				<form action="{{url('register')}}">
					<input type="submit" value="Join Seeker" style="background-color: #F26151;">
				</form>
			</div>
		</div>
	</div>
	<span class="miring2 topspace"></span>
</section>
<section id="promote-section">
	<div class="container">
		<div class="row topspace">
			<div class="col-md-12 text-center">
				<p class="blenda45">
					Featured Freelancer
				</p>
			</div>
		</div>
		<div class="row topspace text-center">
			<div class="col-md-3">
				<div class="well">
					<div>
						<img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="center-block" style="width: 85%">
					</div>
					<h4 class="text-center">Rakha</h4>
					<div>
						<h5>Web Developer</h5>
					</div>
					<form action="#">
						<input type="submit" value="Hire" style="background-color: #F26151;">
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well">
					<div>
						<img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="center-block" style="width: 85%">
					</div>
					<h4 class="text-center">Melisa</h4>
					<div>
						<h5>UI/UX Designer</h5>
					</div>
					<form action="#">
						<input type="submit" value="Hire" style="background-color: #F26151;">
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well">
					<div>
						<img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="center-block" style="width: 85%">
					</div>
					<h4 class="text-center">Gita</h4>
					<div>
						<h5>Data Analyst</h5>
					</div>
					<form action="#">
						<input type="submit" value="Hire" style="background-color: #F26151;">
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well">
					<div>
						<img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="center-block" style="width: 85%">
					</div>
					<h4 class="text-center">Dendi</h4>
					<div>
						<h5>Cleaning Service</h5>
					</div>
					<form action="#">
						<input type="submit" value="Hire" style="background-color: #F26151;">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="testimonial-section">
	<div class="container">
		<div class="row topspace">
			<div class="col-md-12 text-center">
				<p class="blenda45">
					What they said?
				</p>
			</div>
		</div>
		<div class="row topspace">
			<div class="center-block" style="width: 50%">
				<blockquote>
					<p>"I have finished 3 projects with a Freelancer from Proyeku and I think I would like to keep using Proyeku as projects arise. The service they provide is amazing. Thank you Proyeku!!"</p>
					<footer>Udin as <cite>CEO Blabla</cite></footer>
				</blockquote>
				<blockquote class="blockquote-reverse">
					<p>"Proyeku sangat membantu dalam menemukan Freelancer yang tepat untuk menyelesaikan proyek di perusahaan kami."</p>
					<footer>Budi as <cite>CTO Wkwk</cite></footer>
				</blockquote>
				<blockquote>
					<p>"Saya sangat senang mengerjakan berbagai tawaran proyek yang ada di Proyeku. Tidak perlu repot-repot mencari pekerjaan, dengan Proyeku, pekerjaan datang dengan sendirinya."</p>
					<footer>Rakha as <cite>Motion Graphic Design Freelancer</cite></footer>
				</blockquote>
			</div>
		</div>
	</div>
</section>
@stop