{{ Form::model($accepted_job, array('action'=>'AcceptedJobController@update', 'method' => 'POST')) }}

<div class="form-group">
    {{ Form::label('deskripsi', 'Deskripsi') }}
    {{ Form::text('deskripsi', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('rating', 'Rating') }}
    {{ Form::number('rating', null, array('class' => 'form-control')) }}
</div>

{{ Form::hidden('id', $accepted_job->id) }}
{{ Form::hidden('position', $position) }}
{{ Form::submit('Edit detail!', array('class' => 'btn btn-success')) }}
{{ Form::close() }}