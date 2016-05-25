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

function findAllCategoryByJobId($id) {
	return $jobCategory=App\JobCategory::where('job_id', $id)->get();
}

function getJobId($id) {
	$job = App\Job::where('id', $id)->get()->first(); //ambil baris pertama dari tabel Job
	return $job['id'];
}

function categoryIdToName($id) {
	$Category = App\Category::where('id', $id)->get()->first();
	return $Category['kategori'];
}

//Calculate rating
$rating;
if(isset($id)) {
	$user = App\User::where('id', $id)->get()->first();
	//Harusnya ambil job_id saja, terus dimasukin ke array
	$job = App\Job::where('freelancer_info_id', $user['id'])->get()->first();
	$accJob = App\AcceptedJob::where('job_id',$job['id'])->get()->first();
} else {
	$user = App\User::where('id', Auth::user()->id)->get()->first();
	$job = App\Job::where('freelancer_info_id', $user['id'])->get()->first();
	$accJob = App\AcceptedJob::where('job_id',$job['id'])->get()->first();
}

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
		<div class="col-md-4"> 
			<div class="col-md-8 col-md-offset-2">
				<?php $picture = $users->id . '.jpg';?>
				@if (file_exists(public_path('/upload/'.$picture)))
				<img src="{{url('/upload/'.$picture)}}" class="img-circle" style="height: 200px; width: 200px;">
				@else
				<img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="img-circle" style="height: 200px; width: 200px;">
				@endif
			</div> 
			<div class="col-md-8 col-md-offset-2" style="text-align: center;"> 
				<h3>{{ $users->name }}</h3>
				<?php
				if($accJob['rating'] > 0) {
					for($i = 0; $i < $accJob['rating']; $i++) {
						echo '<i class="fa fa-star-o fa-2x" style="color: orange;"></i>';
					}
				} else {
					echo 'Not rated yet';
				}
				?>
				<br>
				<div>
					<h4>{{ $user_info->alamat }}</h4> 
				</div>
			</div>
		</div>

		<br>

		<div class="col-md-8">
			<div class="col-md-12 headline">
				<h1>Special Skills</h1>
				<hr class="hr">
				<div>
					@if($skills == "[]")
					{{$users->name}} has no any special skills at this time
					@else
					<ul>
						@foreach($skills as $skill)
						<li>{{ $skill->skill }}
							@endforeach
						</ul>
						@endif

					</div>
				</div>

				<div class="col-md-12 headline">
					<h1>Services Opened</h1>
					<hr class="hr">
					<div class="row" style="text-align: center;">
						@if($allJobOpen != "[]")
						<?php $j = 1; ?>
						<div class="col-md-12">
							@foreach($allJobOpen as $list) 
							<div class="col-md-3" style="margin-bottom: 10px;"> 
								<table class="table" style="text-align: center;">
									<tr style="height: 100px;">
										<td style="font-size: 18px;"> 
											{{ $list['judul'] }}
										</td>
									</tr>
									<tr style="height: 120px; text-align: center;"> 
										<td style="font-size: 15px;"> 
											{{ $list['deskripsi'] }}
										</td>
									</tr>
									<tr style="height: 100px;">
										<td style="font-size: 15px;"> 
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
											<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=#<?php echo $j; ?>>View Details</button> 
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
											<div> 
												@if(Auth::guest())
												<?php $id = getJobId($list['id']); ?>
												<a href="{{url('job/'.$id)}}" type="button" class="btn btn-danger btn-md">Pesan dan Kontak</a>
												@else
												@if(isset($id) && $id != Auth::user()->id) 
												<?php $id = getJobId($list['id']); ?>
												<a href="{{url('job/'.$id)}}" type="button" class="btn btn-danger btn-md">Pesan dan Kontak</a> 
												@endif
												@endif
											</div>
										</div>
									</div>
								</div>
								<?php $j++; ?>
							</div>
							@endforeach
						</div>
						@else
						<div class="col-md-12">
							<span style="float: left;">{{ $users->name }} has not open any job at this time</span>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop
