<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">
<link href="{{url('/assets/css/job.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<?php

$jobs = App\Job::where('freelancer_info_id', $users->id)->get();

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
<div class="container">
    <h1 style="font-family: Titillium Web;">List of Jobs</h1>
    <br>
    @if($jobs != "[]")
    <table class="table">
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Upah Max</th>
            <th>Upah Min</th>
            <th></th>
        </tr>
        @foreach($jobs as $a_job => $value)
        <tr>
            <td><a href="{{ URL::to('job/' . $value->id) }}">{{ $value->judul }}</a></td>
            <td><a href="{{ URL::to('job/' . $value->id) }}">{{ $value->deskripsi }}</a></td>
            <td><a href="{{ URL::to('job/' . $value->id) }}">Rp {{ convertToCurrency($value->upah_max) }}</a></td>
            <td><a href="{{ URL::to('job/' . $value->id) }}">Rp {{ convertToCurrency($value->upah_min) }}</a></td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                {{ Form::open(array('url' => 'job/' . $value->id, 'class' => '')) }}

                <!-- edit this job (uses the edit method found at GET /job/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('job/' . $value->id . '/edit') }}">Edit</a>

                <!-- delete the job (uses the destroy method DESTROY /job/{id} -->
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger ','onclick'=>'return confirm("Are you sure want to delete this job?")')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="col-md-12" style="background-color: white; height: 100px; text-align: center;">
        <br>
        <br>
        <span style="float: center; font-size: 17px;">Oops, you have not open any job!</span>
    </div>
    @endif
    <a class="btn btn-small btn-success" href="{{url('job/create')}}">Create Job</a>
</div>
@stop