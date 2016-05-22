<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use App\Notification;
use View;

class NotificationController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $logged_user_id = Auth::user()->id;
        $users = User::find($logged_user_id);
        $notification = Notification::where('user_id', $logged_user_id)->get();

        return View::make('notification')
        ->with('users', $users)
        ->with('notification', $notification);
    }
}
