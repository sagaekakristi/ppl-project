<!-- Custom CSS -->
<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<?php
//Mengambil data pada tabel Job dengan id dari user yang sama
$allJobOpen = App\Job::where('freelancer_info_id', $users->id)->get();

function findAllCategoryByJobId($id){
	return $jobCategory=App\JobCategory::where('job_id', $id)->get();
}


function categoryIdToName($id){
	$Category=App\Category::where('id', $id)->get()->first();
	return $Category['kategori'];
}
?>

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

		<div class="col-md-12 headline">
			<h1>Special Skills</h1>
			<hr class="hr">
			<div>
				Web Development, Android Development
			</div>
		</div>

		<br>

		<div class="col-md-12 headline">
			<h1>Jasa Dibuka</h1>
			<hr class="hr">
			<div class="row" style="text-align: center;">
				<?php $i=1; ?>
				<div class="col-md-12" style="margin-bottom: 5px;">

					@foreach($allJobOpen as $list) 
					<div class="col-md-3">
						<table class="table" style="text-align: center;">
							<tr>
								<td style="font-size: 25px;">
									{{ $list['judul'] }}
								</td>
							</tr>
							<tr>
								<td>
									{{ $list['deskripsi'] }}
								</td>
							</tr>
							<tr>
								<td>
									Kategori:
									<br>
									<?php $category = findAllCategoryByJobId($list['id']); ?>
									@if(count($category))
									@foreach($category as $category)
									{!!categoryIdToName($category['category_id'])!!}
									@endforeach
									@else
									-
									@endif
								</td>
							</tr>
							<tr>
								<td>
									Upah:
									<br>
									Rp {{ $list['upah_max'] }} - Rp {{ $list['upah_min'] }}
								</td>
							</tr>
							<tr>
								@if (Auth::guest())
								<td>
									<input type="submit" value="Pesan dan Kontak">
								</td>
								@endif
							</tr>
						</table>
					</div>
					@if($i == 4 || $i == count($allJobOpen))
				</div>
				@if($i != count($allJobOpen))
				<div class="col-md-12" style="margin-bottom: 5px;">
					@endif
					@endif
					<?php $i++; ?>
					@endforeach
				</div>
			</div>

			{{--<div class="col-md-12 headline">
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
		</div>--}}
	</div>
</div>
@stop
