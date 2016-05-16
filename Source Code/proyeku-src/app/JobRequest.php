<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    // specify table name, primary key
    protected $table = 'job_request';
    //protected $primaryKey = array('job_id', 'seeker_id');

    // disable timestamps created_at updated_at
    public $timestamps = true;

    public static function find($job_id, $seeker_id) {
	    return JobRequest::where('job_id', '=', $job_id)
	        ->where('seeker_id', '=', $seeker_id)
	        ->first();
	}
}
