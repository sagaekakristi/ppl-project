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
        <form class="col-md-6 col-md-offset-3" role="search" style="margin-bottom: 170px;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" style="height: 40px;">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" style="background-color: #F26151; color: white; height: 40px;"><strong>Cari Freelancer</strong></button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop