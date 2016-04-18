<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller{

	public function search($search){

        $search = urldecode($search);
        /*
        $jobs = DB::table('job')
        	->where('judul', 'LIKE', '%'.$search.'%')
        	->orderBy('id')
        	->paginate(10);
        */
        //$jobs = DB::select("SELECT * FROM `job` WHERE `judul` LIKE '%".$search."%' ORDER BY `id`'");
        $jobs = DB::select('select * FROM job where judul LIKE ?', ['%'.$search.'%']);

        if(count($jobs)==0){
        	return View('search')
        	->with('message','unexist')
        	->with('search', $search);
        } else{
        	return View('search')
        	->with('jobs', $jobs)
        	->with('search', $search);
        }
    }

}