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
use Validator;
use Session;

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
    public function freelancerIndex()
    {
        $logged_user_id = Auth::user()->id;
        $query = "SELECT * ";
        $query .= "FROM accepted_job ac, job j ";
        $query .= "WHERE ac.job_id = j.id and j.freelancer_info_id = ".$logged_user_id;
        $accepted_jobs = DB::select(DB::raw($query));

        return View::make('job.accepted')
            ->with('accepted_jobs', $accepted_jobs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seekerIndex()
    {
        $logged_user_id = Auth::user()->id;
        $accepted_jobs = AcceptedJob::where('seeker_id', $logged_user_id)->get();

        return View::make('job.accepted')
            ->with('accepted_jobs', $accepted_jobs);
    }

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
    public function freelancerShow($id)
    {
        $accepted_job = AcceptedJob::find($id);
        $logged_user_id = Auth::user()->id;

        // if the accepted job with those id exist
        if($accepted_job != null){
            $job_freelancer_id = Job::find($accepted_job->job_id)->freelancer_info_id;

            // check if the owner of this accepted job is the logged-in user
            if($logged_user_id == $job_freelancer_id){
                return View::make('accepted.freelancer.show')
                    ->with('accepted_job', $accepted_job);
            }
            // if not the owner, redirect to accepted index
            else{
                return Redirect::to('freelancer/accepted');
            }
        }
        // if the accepted job with those id does not exist
        else {
            return Redirect::to('freelancer/accepted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seekerShow($id)
    {
        $accepted_job = AcceptedJob::find($id);
        $logged_user_id = Auth::user()->id;

        // if the accepted job with those id exist
        if($accepted_job != null){

            // check if the owner of this accepted job is the logged-in user
            if($logged_user_id == $accepted_job->seeker_id){
                return View::make('accepted.seeker.show')
                    ->with('accepted_job', $accepted_job);
            }

            // if not the owner, redirect to accepted index
            else{
                return Redirect::to('seeker/accepted');
            }
        }

        // if the accepted job with those id does not exist
        else {
            return Redirect::to('seeker/accepted');
        }
        
    }

    public function freelancerEdit($id)
    {
        // get the job
        $accepted_job = AcceptedJob::find($id);
        $logged_user_id = Auth::user()->id;

        // if the accepted job with those id exist
        if($accepted_job != null){
            $job_freelancer_id = Job::find($accepted_job->job_id)->freelancer_info_id;

            // check if the owner of this accepted job is the logged-in user
            if($logged_user_id == $job_freelancer_id){
                // show the edit form and pass the nerd
                return View::make('accepted.edit')
                    ->with('position', 'freelancer')
                    ->with('accepted_job', $accepted_job);
            }

            // if not the owner, redirect to accepted index
            else{
                return Redirect::to('seeker/accepted');
            }
        }
        // if the accepted job with those id does not exist
        else {
            return Redirect::to('seeker/accepted');
        }
    }

    public function seekerEdit($id)
    {
        // get the job
        $accepted_job = AcceptedJob::find($id);
        $logged_user_id = Auth::user()->id;
        // if the accepted job with those id exist
        if($accepted_job != null){

            if($logged_user_id == $accepted_job->seeker_id){
                // show the edit form and pass the nerd
                return View::make('accepted.edit')
                    ->with('position', 'seeker')
                    ->with('accepted_job', $accepted_job);
            }
            
            // if not the owner, redirect to accepted index
            else{
                return Redirect::to('freelancer/accepted');
            }
        }
        // if the accepted job with those id does not exist
        else {
            return Redirect::to('freelancer/accepted');
        }

        
    }

    public function update()
    {
        $id = Input::get('id');
        $position = Input::get('position');

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'rating' => 'required'
            );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to($position.'/accepted'.'/'.$id.'/edit')
            ->withErrors($validator)
                ->withInput(Input::except('password')); // TODO: Check
        } else {
        // store
            $accepted_job = AcceptedJob::find($id);
            $accepted_job->deskripsi = Input::get('deskripsi');
            $accepted_job->rating = Input::get('rating');
            $accepted_job->save();

        // redirect
            Session::flash('message', 'Successfully updated detail on accepted job!');
            return Redirect::to($position.'/accepted'.'/'.$id);
        }
    }

    public function freelancerRequestDone()
    {
        $accepted_job_id = Input::get('accepted_job_id');
        $accepted_job = AcceptedJob::find($accepted_job_id);
        $accepted_job->freelancer_confirm_done = 1;        

        // kalo seeker juga udah setuju done
        if($accepted_job->seeker_confirm_done == 1){
            // ubah status accepted job ini menjadi done
            $accepted_job->status = 1;
            $accepted_job->waktu_selesai = DB::raw('CURRENT_TIMESTAMP');
            $accepted_job->save();
        }
        // kalo freelancer belum setuju done
        else {
            $accepted_job->save();
        }

        return Redirect::to('freelancer/accepted/'.$accepted_job_id);
    }

    public function seekerRequestDone()
    {
        $accepted_job_id = Input::get('accepted_job_id');
        $accepted_job = AcceptedJob::find($accepted_job_id);
        $accepted_job->seeker_confirm_done = 1;        

        // kalo freelancer juga udah setuju done
        if($accepted_job->freelancer_confirm_done == 1){
            // ubah status accepted job ini menjadi done
            $accepted_job->status = 1;
            $accepted_job->waktu_selesai = DB::raw('CURRENT_TIMESTAMP');
            $accepted_job->save();
        }
        // kalo freelancer belum setuju done
        else {
            $accepted_job->save();
        }

        return Redirect::to('seeker/accepted/'.$accepted_job_id);
    }
}
