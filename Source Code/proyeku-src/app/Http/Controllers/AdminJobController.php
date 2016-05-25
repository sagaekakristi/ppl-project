<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use Input;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Job;
use App\User;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $search = Input::get('search');
        if($search != null) {
            $jobs = DB::table('job')
            ->where('judul', 'LIKE', '%'.$search.'%')
            ->orWhere('deskripsi', 'LIKE', '%'.$search.'%')
            ->paginate(5);
        } else {
            $jobs = Job::paginate(5);
        }
        $users = User::all();
        return View::make('admin.job.index')
        ->with('jobs', $jobs)
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $job = new Job;

        $job->id = Input::get('id');
        $job->freelancer_id = Input::get('freelancer_id');
        $job->judul = Input::get('judul');
        $job->deskripsi = Input::get('deskripsi');
        $job->upah_max = Input::get('upah_max');
        $job->upah_min = Input::get('upah_min');

        $job->save();

        return Redirect::to('/admin/manage/job');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job = Job::find($id);
        $user = User::find($job->freelancer_info_id);
        
        return View::make('admin.job.show')
        ->with('job', $job)
        ->with('user', $user);
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
        $job = Job::find($id);

        return View::make('admin.job.edit')
        ->with('job',$job);
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
        $job = Job::find($id);

        $job->judul = Input::get('judul');
        $job->deskripsi = Input::get('deskripsi');
        $job->upah_max = Input::get('upah_max');
        $job->upah_min = Input::get('upah_min');

        $job->save();

        return Redirect::to('/admin/manage/job');
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
        Job::destroy($id);

        return Redirect::to('/admin/manage/job');
    }
}
