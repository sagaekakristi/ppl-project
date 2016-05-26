<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Job;
use App\JobRequest;
use Input;
use App\UserInfo;
use App\FreelancerInfo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use View;
use DB;
use App\AcceptedJob;
use App\Message;
use App\Notification;

class JobRequestController extends Controller
{
	/**
     * Specify auth middleware for access control: harus login dulu!
     */
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Request job from seeker to freelancer
	 *
	 * @return Response
	 */
	public function requestJob()
	{
		$job_id = Input::get('job_id');
		$seeker_id = Input::get('seeker_id');
		$message = Input::get('message');

		if(JobRequest::find($job_id, $seeker_id) == null){
			if(Job::find($job_id)->freelancer_info_id != $seeker_id){
				// create job_request instances
				$newJobRequest = new JobRequest;
				$newJobRequest->job_id = $job_id;
				$newJobRequest->seeker_id = $seeker_id;
				$newJobRequest->save();	

				// send message from seeker to freelancer
				$logged_user_id = Auth::user()->id;
				if($message != ''){
					$freelancer_info_id = Job::find($job_id)->freelancer_info_id;
					$job_owner_user_id = $freelancer_info_id;

					$new_message = new Message;
			        $new_message->sender_user_id = $logged_user_id;
			        $new_message->receiver_user_id = $job_owner_user_id;
			        $new_message->message_content = $message;
			        $new_message->save();
				}

				// add notification to the freelacer
				$freelancer_id = User::find(FreelancerInfo::find(Job::find($job_id)->freelancer_info_id)->user_info_id)->id;
				$seeker_name = User::find($seeker_id)->name;
				$job_name = Job::find($job_id)->judul;
				$notification = new Notification;
		    	$notification->user_id = $freelancer_id;
		    	$notification->notif = "Anda mendapat tawaran job dari ".$seeker_name." untuk job ".$job_name;
		    	$notification->type = 1;
		    	$notification->save();
			}
			else{ 
				// if the seeker is the owner itself!
			}
			
		}
		else{
			// seeker already requested this job
			// mungkin mau nambah session info disini
		}

		return Redirect::to('job/'.$job_id); // need revise into calling JobPageController controller to be more scalable
	}

	/**
	 * Show all job request for the logged-in user
	 *
	 * @return Response
	 */
	public function showAllRequest()
	{
		// get all his/her job
		$logged_user_id = Auth::user()->id;
		$user_info = UserInfo::find($logged_user_id);
		$freelancer_info = FreelancerInfo::find($user_info->user_id);

        $jobs = Job::where('freelancer_info_id', $freelancer_info->user_info_id)->get();

        $query = "SELECT jr.job_id, jr.seeker_id, j.deskripsi ";
        $query = $query."FROM job_request jr, job j ";
        $query = $query."WHERE j.freelancer_info_id = ". $freelancer_info->user_info_id ." and j.id = jr.job_id";
		$job_requests = DB::select(DB::raw($query));

		$job_requests_data = [];
		foreach ($job_requests as $a_job_req => $value) {
			# code...
			$job_id = $value->job_id;
			$job_deskripsi = $value->deskripsi;
			$seeker_id = $value->seeker_id;
			$seeker_email = User::find($seeker_id)->email;

			$a_job_req_data = array(
				'job_id' => $job_id,
				'job_deskripsi' => $job_deskripsi,
				'seeker_id' => $seeker_id,
				'seeker_email' => $seeker_email
			);
			array_push($job_requests_data, $a_job_req_data);
		}

		return View::make('job.requests')
            ->with('job_requests_data', $job_requests_data);
	}

	/**
	 * Accept job from seeker
	 *
	 * @return Response
	 */
	public function acceptJob()
	{
		$job_id = Input::get('job_id');
		$seeker_id = Input::get('seeker_id');

		//accept job, create accepted_job
		$accepted_job = new AcceptedJob;
		$accepted_job->job_id = $job_id;
		$accepted_job->seeker_id = $seeker_id;
		$accepted_job->save();

		//delete request
		$job_request = JobRequest::find($job_id, $seeker_id);
		//$job_request->delete();
		$query = "DELETE FROM job_request ";
        $query = $query."WHERE job_id = " . $job_id . " and seeker_id = " . $seeker_id;
        DB::select(DB::raw($query));

        // add notification to the freelacer
		$freelancer_id = User::find(FreelancerInfo::find(Job::find($job_id)->freelancer_info_id)->user_info_id)->id;
		$freelancer_name = User::find($freelancer_id)->name;
		$job_name = Job::find($job_id)->judul;

		$notification = new Notification;
    	$notification->user_id = $seeker_id;
    	$notification->notif = "Tawaran job ".$job_name." telah diterima oleh freelancer ".$freelancer_name;
    	$notification->type = 2;
    	$notification->save();

		return Redirect::to('show-job-request/');
	}

	/**
	 * Show accepted jobs
	 *
	 * @return Response
	 */
	// public function showAllAcceptedJob()
	// {
	// 	$logged_user_id = Auth::user()->id;
	// 	$accepted_jobs = AcceptedJob::all();

	// 	return View::make('job.accepted')
 //            ->with('accepted_jobs', $accepted_jobs);
	// }
}
