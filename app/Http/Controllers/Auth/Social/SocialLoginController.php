<?php

namespace App\Http\Controllers\Auth\Social;

use App\User;
use Socialite;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
    
    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    
    public function handleProviderCallback($provider)
    {

        $user = $this->findOrCreateProvidedUser(
            Socialite::driver($provider)->user()
        );

        auth()->login($user);

        return redirect('/');
    }

    
    public function findOrCreateProvidedUser($providedUser)
    {
       $user = User::firstOrNew(['provider_id' => $providedUser->id]);

       if($user->exists) return $user;

       $user->fill([
           'name'        => $providedUser->nickname,
           'email'       => $providedUser->email,
           'avatar'      => $providedUser->avatar,
           'provider_id' => $providedUser->id,
       ])->save();

       return $user;
    }
}
