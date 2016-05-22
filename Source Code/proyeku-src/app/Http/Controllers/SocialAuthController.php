<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use App\UserInfo;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
    	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    	auth()->login($user);
        $userinfo = UserInfo::find($user->id);
        if(empty($userinfo)) {
            return redirect()->to('/profile/create/info');
        } else {
            return redirect()->to('/');
        }
    }
}