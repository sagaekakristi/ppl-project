<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
// Cari akun di db
        $account = SocialAccount::whereProvider('facebook')
        ->whereProviderUserId($providerUser->getId())
        ->first();

        if ($account) {
            // Kalo ada > return user
            return $account->user;
        } else {
            // Kalo gaada > register
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
                ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if(!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }
    }
}