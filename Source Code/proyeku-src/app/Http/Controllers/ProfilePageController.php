<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserInfo;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Auth;
//use Illuminate\Auth;
use Illuminate\Support\Facades\Auth;

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

        $alamat = $user_info->alamat;
        $tanggal_lahir = $user_info->tanggal_lahir;
        $jenis_kelamin = $user_info->jenis_kelamin;

        // $out = '';
        // $out = $out . 'alamat: ' . $alamat . '<br>';
        // $out = $out . 'tanggal lahir: ' . $tanggal_lahir . '<br>';
        // $out = $out . 'gender: ' . $jenis_kelamin . '<br>';
		//return $out;
		
        return view('profile', ['user_info' => $user_info]);
    }
}
