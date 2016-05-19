@foreach($accepted_jobs as $a_accepted_job)
<p>
{{ $a_accepted_job->job_id }}
{{ $a_accepted_job->seeker_id }}
{{ $a_accepted_job->waktu_mulai }}
</p>
@endforeach