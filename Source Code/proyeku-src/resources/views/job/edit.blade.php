<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')

<div class="container-fluid">
    <div class="col-md-8 col-md-offset-2" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px;">
        <h1>Edit {{ $job->judul }}</h1>
        <br>
        {{ Form::model($job, array('route' => array('job.update', $job->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('judul', 'Judul') }}
            {{ Form::text('judul', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('deskripsi', 'Deskripsi') }}
            {{ Form::text('deskripsi', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('upah_max', 'Upah Max') }}
            {{ Form::number('upah_max', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('upah_min', 'Upah Min') }}
            {{ Form::number('upah_min', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="kategori">
                <option value="" selected="selected"></option>
                @foreach ($category as $cat)
                <option value="{{$cat->id}}">{{$cat->kategori}}</option>
                @endforeach
            </select>
        </div>

        {{ Form::submit('Edit the Job!', array('class' => 'btn btn-success')) }}

        {{ Form::close() }}
    </div>
</div>
@stop