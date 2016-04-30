<!DOCTYPE html>
<html>
<head>
    <title>Edit Job</title>
</head>
<body>
<div class="container">

<h1>Edit {{ $job->judul }}</h1>

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

    {{ Form::submit('Edit the Job!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>