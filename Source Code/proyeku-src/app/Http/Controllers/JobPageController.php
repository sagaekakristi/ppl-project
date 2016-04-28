<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;
use App\JobCategory;
use App\Category;
use Illuminate\Support\Facades\Auth;
use View;

class JobPageController extends Controller
{
	public function showJobPage($job_id)
	{

		$logged_user_id = Auth::user()->id;

        $job_info = Job::find($job_id);

        $job_category_info = JobCategory::where('job_id', '=', $job_id)->get();

        // $category_info = Category::all();
		// $spec_string = 'abc';
		// 	foreach ($job_category_info as $a_job_category) {
		// 	$spec_string = $spec_string.$a_job_category->category_id;
		// }

		$category_array = array();
		foreach ($job_category_info as $a_job_category){
			$a_category_id = $a_job_category->category_id;
			$a_category_value = Category::find($a_category_id)->kategori;
			$category_array[count($category_array)] = $a_category_value;
		}
		
		$data['job_info'] = $job_info;
		$data['category_array'] = $category_array;

		return View::make('job')->with('data', $data);
	}
}
