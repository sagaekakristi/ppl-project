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
		//return Socialite::driver('facebook')->redirect();
		return Socialite::driver('facebook')
            ->scopes(['user_friends'])->redirect();
	}
	
	public function callback(SocialAccountService $service)
	{
		$providerUser = Socialite::driver('facebook')->user();
		$user = $service->createOrGetUser($providerUser);
		$token = $providerUser->token;
		\Session::put('fb_user_access_token', (string) $token);
		auth()->login($user);
		$userinfo = UserInfo::find($user->id);
        if(empty($userinfo)) {
            return redirect()->to('/profile/create/info');
        } else {
            return redirect()->to('/');
        }
	}
}