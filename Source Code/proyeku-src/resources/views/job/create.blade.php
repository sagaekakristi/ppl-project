<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container-fluid">
    <div class="col-md-8 col-md-offset-2" style="background-color: white; border-radius: 5px; margin-top: 30px; margin-bottom: 30px;">
        <h1>Create a Job</h1>
        {{ Form::open(array('url' => 'job')) }}

        <div class="form-group">
            {{ Form::label('judul', 'Judul') }}
            {{ Form::text('judul', Input::old('judul'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('deskripsi', 'Deskripsi') }}
            {{ Form::text('deskripsi', Input::old('deskripsi'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('upah_max', 'Upah Max') }}
            {{ Form::number('upah_max', Input::old('upah_max'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('upah_min', 'Upah Min') }}
            {{ Form::number('upah_min', Input::old('upah_min'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
        <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category">
                <option value="" selected="selected"></option>
                @foreach ($category as $cat)
                <option value="{{$cat->id}}">{{$cat->kategori}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" value="Add Skill" class="btn btn-success" style="border-radius: 5px;"><i class="fa fa-plus"></i> Create Job</button>

        {{ Form::close() }}
    </div>
</div>
@stop
