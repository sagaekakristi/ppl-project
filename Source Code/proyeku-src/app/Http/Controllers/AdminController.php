<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
    	$logged_user_id = Auth::user()->id;
    	if($logged_user_id == 1) {
    		$users = User::all();
    		return view('admin', ['users' => $users]);
    	}
    	else {
    		return redirect('home');
    	}
	}
}
