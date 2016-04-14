<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserInfo;
use App\Http\Controllers\Controller;

class UserInfoController extends Controller
{
    /**
     * Show a list of all available flights.
     *
     * @return Response
     */
    public function index()
    {
        $users_info = UserInfo::all();
        $out = 'Alamats: ';

        foreach ($users_info as $info) {
		    $out = $out . $info->alamat;
		}

		return $out;
        //return view('user.index', ['users' => $users]);
    }
}
