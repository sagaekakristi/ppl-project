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

class AcceptedJobController extends Controller
{
    /**
     * Specify auth middleware for access control: harus login dulu!
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged_user_id = Auth::user()->id;
        $accepted_jobs = AcceptedJob::all();
        $query = "SELECT * ";
        $query .= "FROM accepted_job ac, job j ";
        $query .= "WHERE ac.job_id = j.id and j.freelancer_info_id = ".$logged_user_id;
        $accepted_jobs = DB::select(DB::raw($query));

        return View::make('job.accepted')
            ->with('accepted_jobs', $accepted_jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accepted_job = AcceptedJob::find($id);
        $logged_user_id = Auth::user()->id;

        // if the accepted job with those id exist
        if($accepted_job != null){
            $job_freelancer_id = Job::find($accepted_job->job_id)->freelancer_info_id;
            // check if the owner of this accepted job is the logged-in user
            if($logged_user_id == $job_freelancer_id){
                return View::make('accepted.show')
                    ->with('accepted_job', $accepted_job);
            }
            // if not the owner, redirect to accepted index
            else{
                return Redirect::to('show-job-accepted');
            }
        }
        // if the accepted job with those id does not exist
        else {
            return Redirect::to('show-job-accepted');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
