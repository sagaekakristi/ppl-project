<!-- Custom CSS -->
<link href="{{url('/assets/css/header.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container-fluid" style="color: #3D566E; margin-bottom: 20px;">
<h1 style="font-family: Titillium Web;">List Of Job</h1>
<br>
<table class="table">
	<thead>
        <tr style="font-weight: bold;">
            <td>Judul</td>
            <td>Deskripsi</td>
            <td>Upah Max</td>
            <td>Upah Min</td>
        </tr>
    </thead>
    <tbody>
    @foreach($jobs as $a_job => $value)
        <tr>
            <td>{{ $value->judul }}</td>
            <td>{{ $value->deskripsi }}</td>
            <td>{{ $value->upah_max }}</td>
            <td>{{ $value->upah_min }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                 {{ Form::open(array('url' => 'job/' . $value->id, 'class' => '')) }}
                    <!-- show the job (uses the show method found at GET /job/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('job/' . $value->id) }}">Show this Job</a>

                    <!-- edit this job (uses the edit method found at GET /job/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('job/' . $value->id . '/edit') }}">Edit this Job</a>

                    <!-- delete the job (uses the destroy method DESTROY /job/{id} -->
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Job', array('class' => 'btn btn-danger ','onclick'=>'return confirm("are you sure?")')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-small btn-info" href="{{url('job/create')}}">Create Job</a>
</div>
@stop