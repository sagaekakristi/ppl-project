<!-- Custom CSS -->
<link href="{{url('/assets/css/search.css')}}" rel="stylesheet">
<link href="{{url('/assets/css/bootstrap-social.css')}}" rel="stylesheet">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script> 

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')


<script>
    $(document).ready(function() {
        $('#advanceSearch').hide();
        $('#advance').click(function() {
            $('#advanceSearch').slideToggle('slow');
        });
    });
</script>

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

$rating;
?>

<div class="container" id="body">
    @if (count($errors) > 0)
    <div class="alert alert-danger" style="margin-top: 10px; text-align: center;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row" id="header">
        <div class="col-md-8 col-md-offset-2">
            <form id="searchform" class="topspace" role="search" action="{{url('/search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" style="height: 40px;" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="background-color: #F26151; color: white; height: 40px;"><strong>Find Freelancer</strong></button>
                    </div>
                </div>
                <div id="advanceSearch" style="background-color: white; padding: 15px;">
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="katList">Kategori</label>
                                    <select class="form-control" id="katList" name="category">
                                        <option value="" selected="selected"></option>
                                        @foreach ($catList as $cat)
                                        <option value="{{$cat->kategori}}">{{$cat->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <label for="upah_min">Upah Minimal</label>
                                    <input type="text" class="form-control" style="height: 40px; border-radius: 10px;" name="upah_min" id="upah_min" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <label for="upah_max">Upah Maksimal</label>
                                    <input type="text" class="form-control" style="height: 40px; border-radius: 10px;" name="upah_max" id="upah_max" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="lok">Lokasi</label>
                            <input type="text" class="form-control" placeholder="Lokasi.." style="height: 40px;" name="location" id="lok">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order">Sort By</label>
                                <select class="form-control" id="order" name="order">
                                    <option value="user_info.user_rating" selected="selected"></option>
                                    <option value="user_info.user_rating">Rating</option>
                                    <option value="users.created_at">Newest Freelancer</option>
                                    <option value="users.updated_at">Most Active Freelancer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="reset" style="border-radius: 5px; background-color: #F26151; color: white; height: 40px;"><strong>Reset Field</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button id="advance" class="btn btn-info">Advance Search</button>
            <div>
                @if(empty($fbfriends))
                <section style="margin-top: 20px;">
                    Login with Facebook to get friends as freelancer suggestion!
                    <div class="center-block" style="width: 35%">
                        <a href="{{url('fbred')}}" type="submit" class="btn btn-block btn-social btn-facebook">
                            <span class="fa fa-facebook"></span> Sign in with Facebook
                        </a>
                    </div>
                    <div class="topspace"></div>
                </section>
                @endif
            </div>
        </div>
    </div>

    @if(!empty($recomendedJobs))
    @foreach ($recomendedJobs as $recomendedJob)
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <img width="125" height="125" class="searchPic" src="{{url($recomendedJob->profile_picture_link)}}">
                </div>
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
                    <a href="{{url('/job/'.$recomendedJob->id)}}" class="btn btn-default" style="background-color: #F26151; color: white; height: 40px;">
                        <div class="col-md-1">
                            <strong>Hire</strong>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8 text-left">
                <span class="label label-primary">Recomended</span>
                <div>
                    <h2>{{ $recomendedJob->name }} <small>{{--Occupation--}}</small><br><small>{{ $recomendedJob->alamat }}</small></h2>
                </div>
                <div>
                    <h3>{{ $recomendedJob->judul }}</h3>
                    <h5>
                        {{ $recomendedJob->deskripsi }} 
                    </h5>
                </div>
                <div>
                    <h5>Upah: Rp {{ convertToCurrency($recomendedJob->upah_min) }} - Rp {{ convertToCurrency($recomendedJob->upah_max) }}</h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @unless (count($jobs))
    <div class="bg-warning" style='padding: 20px'>
        Unfortunately no freelancer found.
        Try different keyword.
    </div>
    @else
    @foreach ($jobs as $job)
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <?php 
                    $users = App\User::find($job->freelancer_info_id)->first();
                    $picture = $users['id'] . '.jpg';
                    ?>
                    @if (file_exists(public_path('/upload/'.$picture)))
                    <img src="{{url('/upload/'.$picture)}}" class="img-circle" style="height: 200px; width: 200px;">
                    @else
                    <img src="{{url('/assets/pictures/profile-default-icon.png')}}" class="img-circle" style="height: 200px; width: 200px;">
                    @endif
                </div>
                <br>
                <div>
                 
                </div>
                <br>
                <div>
                    <a href="{{url('/job/'.$job->id)}}" class="btn btn-default" style="background-color: #F26151; color: white; height: 35px;">
                        <div class="col-md-1">
                            <strong>Hire</strong>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-8 text-left">
                <div>
                    <h2><a href="{{ URL::to('/profile/view', array('name'=>$job->freelancer_info_id)) }}">{{$job->name}}</a>
                        <br>
                    </div>
                    <div>
                        <h3>{{ $job->judul }}</h3>
                        <h5>
                            {{ $job->deskripsi }} 
                        </h5>
                    </div>
                    <div>
                        <h5>Upah: Rp {{ convertToCurrency($job->upah_min) }} - Rp {{ convertToCurrency($job->upah_max) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {!! $jobs->links() !!}
        @endunless
    </div>
    @stop