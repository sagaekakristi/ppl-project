<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller{

	public function search($search){

        $search = urldecode($search);
        $job = DB::table('job')
        	->where('name', 'LIKE', '%'.$search.'%')
        	->orderBy('id')
        	->paginate(10);

        if(count($job)==0){
        	return View('search')
        	->with('message','unexist')
        	->with('search', $search);
        } else{
        	return View('search')
        	->with('job','job')
        	->with('search', $search);
        }
    }

}