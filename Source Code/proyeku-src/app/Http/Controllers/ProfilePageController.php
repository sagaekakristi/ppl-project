<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserInfo;
use App\FreelancerInfo;
use App\Job;
use App\JobCategory;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;

class ProfilePageController extends Controller
{
    /**
     * Show a list of all available flights.
     *
     * @return Response
     */
    public function index()
    {
    	$logged_user_id = Auth::user()->id;
        $user_info = UserInfo::find($logged_user_id);
        $users = User::find($logged_user_id);
        
        $alamat = $user_info->alamat;
        $tanggal_lahir = $user_info->tanggal_lahir;
        $jenis_kelamin = $user_info->jenis_kelamin;
        $nama = $users->name;

        // get all the job
        $user_info = UserInfo::find($logged_user_id);
        $freelancer_info = FreelancerInfo::find($user_info->user_id);
        $jobs = Job::where('freelancer_info_id', $freelancer_info->user_info_id)->get();

        // load the view and pass the jobs
        return View::make('profile')
        ->with('jobs', $jobs)
        ->with('user_info', $user_info)
        ->with('users', $users);
    }
}
