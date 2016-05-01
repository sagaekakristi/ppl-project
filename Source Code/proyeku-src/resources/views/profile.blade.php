<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header')
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
		<h1>{{ $users->name }}</h1>
		<div class="star-rating">
			<div class="star-rating__wrap">
				<input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
				<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5"></label>
				<input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
				<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4"></label>
				<input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
				<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3"></label>
				<input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
				<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2"></label>
				<input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
				<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1"></label>
			</div>
		</div>
		<div>
			<h3>{{ $user_info->alamat }}</h3>
		</div>

		<br>

		<div class="md-col-12 headline">
			<h1>Special Skills</h1>
			<hr class="hr">
			<div>
				Web Development, Jasa Skripsi.
			</div>
		</div>

		<br>

		<div class="md-col-12 headline">
			<h1>Jasa Dibuka</h1>
			<hr class="hr">
			<div class="row" style="text-align: center;">
				@for ($i = 0; $i < 4; $i++)
				<div class="col-md-3">
					<table class="table" style="text-align: center; border-bottom: 5px solid #D5EDF5;">
						<tr>
							<td style="font-size: 25px;">
								box {{$i}} Web Development
							</td>
						</tr>
						<tr>
							<td>
								box {{$i}} Deskripsi
							</td>
						</tr>
						<tr>
							<td>
								box {{$i}} Kategori
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Pesan dan Kontak">
							</td>
						</tr>
					</table>
				</div>
				@endfor
			</div>
		</div>

		<div class="md-col-12 headline">
			<h1>Projects</h1>
			<hr class="hr">
			<div class="row" style="text-align: center;">
				@for ($i = 0; $i < 10; $i++)
				<div class="col-md-3">
					<table class="table" style="text-align: center; border-bottom: 5px solid #D5EDF5;">
						<tr>
							<td style="font-size: 25px;">
								box {{$i}} Kategori
							</td>
						</tr>
						<tr>
							<td>
								box {{$i}} As a $role
							</td>
						</tr>
						<tr>
							<td>
								<div class="star-rating">
									<div class="star-rating__wrap">
										<input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5"></label>
										<input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4"></label>
										<input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3"></label>
										<input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2"></label>
										<input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
										<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1"></label>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								Rating in integer
							</td>
						</tr>
					</table>
				</div>
				@endfor
			</div>
		</div>
	</div>
</div>
@stop
