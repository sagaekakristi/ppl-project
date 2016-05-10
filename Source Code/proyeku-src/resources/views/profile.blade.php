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

<?php
//Method agar upah mudah dibaca 
function convertToCurrency($uang) {
	$number = (string) $uang;
	$numberLength = strlen($number);
	$numberArray = array();
	$currencyArray = array();
	$currency = "";
	for($i = 0; $i < $numberLength; $i++) {
		array_push($numberArray, $number[$i]);
	}

	$j = $numberLength-1;
	$k = $numberLength-1;
	for($i = 0; $i <= $j; $i++) {
		$currencyArray[$i] = $numberArray[$k];
		$k--;
	}

	$count = 0;
	for($i = 0; $i < sizeof($currencyArray); $i++) {
		if(($count % 3 == 0) && ($count != 0)) {
			$currency = $currency . ".";
		}
		$currency = $currency . $currencyArray[$i];
		$count++;
	}
	return strrev($currency);
}
?>

<div class="container-fluid" id="body">
	<div class="col-md-12">
		<div class="col-md-6">
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
			</div>
		</div>

		<br>

		<div class="col-md-6">
			<div class="col-md-12 headline">
				<h1>Special Skills</h1>
				<hr class="hr">
				<div>
					Web Development, Android Development
				</div>
			</div>

			<div class="col-md-12 headline">
				<h1>Jasa Dibuka</h1>
				<hr class="hr">
				<div class="row" style="text-align: center;">
					<?php $j = 1; ?>
					<div class="col-md-12">
						@foreach($allJobOpen as $list) 
						<div class="col-md-6" style="margin-bottom: 10px;">
							<table class="table" style="text-align: center;">
								<tr style="height: 100px;">
									<td style="font-size: 25px;">
										{{ $list['judul'] }}
									</td>
								</tr>
								<tr style="height: 100px;">
									<td>
										{{ $list['deskripsi'] }}
									</td>
								</tr>
								<tr style="height: 100px;">
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
										<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=#<?php print $j; ?>>View Details</button>
									</td>
								</tr>
							</table>
						</div>
						<!-- Modal -->
						<div id=<?php print $j; ?> class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Job Detail</h4>
									</div>
									<div class="modal-body">
										<table class="table">
											<tr>
												<td>
													Judul
												</td>
												<td>
													: {{ $list['judul'] }}
												</td>
											</tr>
											<tr>
												<td>
													Deskripsi
												</td>
												<td>
													: {{ $list['deskripsi'] }}
												</td>
											</tr>
											<tr>
												<td>
													Kategori
												</td>
												<td>
													: <?php $category = findAllCategoryByJobId($list['id']); ?>
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
													Upah
												</td>
												<td>
													: Rp {{ convertToCurrency($list['upah_min']) }} - Rp {{ convertToCurrency($list['upah_max']) }}
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php $j++; ?>
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
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop
