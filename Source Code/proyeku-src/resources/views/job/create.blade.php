<!DOCTYPE html>
<html>
<head>
    <title>Create Job</title>
</head>
<body>
<div class="container">

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

    {{ Form::submit('Create the Job!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>