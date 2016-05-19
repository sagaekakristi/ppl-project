@foreach($job_requests_data as $a_job_req)
<p>
{{ $a_job_req['job_id'] }}
{{ $a_job_req['job_deskripsi'] }}
{{ $a_job_req['seeker_email'] }}
</p>
{{ Form::open(array('action'=>'JobRequestController@acceptJob', 'method' => 'post')) }}
{{ Form::hidden('job_id', $a_job_req['job_id']) }}
{{ Form::hidden('seeker_id', $a_job_req['seeker_id']) }}
{{ Form::submit('Accept this Job', array('class' => 'btn btn-success')) }}
{{ Form::close() }}
@endforeach