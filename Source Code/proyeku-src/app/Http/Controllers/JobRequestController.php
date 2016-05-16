<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;
use App\JobRequest;
use Input;
//use App\Http\Controllers\JobPageController;
use Illuminate\Support\Facades\Redirect;

class JobRequestController extends Controller
{
    /**
	 * Request job from seeker to freelancer
	 *
	 * @return Response
	 */
	public function requestJob()
	{
		$job_id = Input::get('job_id');
		$seeker_id = Input::get('seeker_id');

		if(JobRequest::find($job_id, $seeker_id) == null){
			if(Job::find($job_id)->freelancer_info_id != $seeker_id){
				$newJobRequest = new JobRequest;
				$newJobRequest->job_id = $job_id;
				$newJobRequest->seeker_id = $seeker_id;
				$newJobRequest->save();	
			}
			else{ 
				// if the seeker is the owner itself!
			}
			
		}
		else{
			//already requested
			//mungkin mau nambah session info disini
		}

		return Redirect::to('job/'.$job_id); // need revise into calling JobPageController controller to be more scalable
	}
}
