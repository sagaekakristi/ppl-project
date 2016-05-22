<p>
	{{ $accepted_job->job_id }}
	{{ $accepted_job->seeker_id }}
	{{ $accepted_job->waktu_mulai }}
</p>

@if($accepted_job->status != 1)
{{ Form::open(array('action'=>'AcceptedJobController@freelancerRequestDone', 'method' => 'post')) }}
{{ Form::hidden('accepted_job_id', $accepted_job->id) }}
{{ Form::submit('Tandai job sudah selesai', array('class' => 'btn btn-success')) }}
{{ Form::close() }}
@endif

<a href="{{ url('/freelancer/accepted/'.$accepted_job->id.'/edit') }}">edit</a>