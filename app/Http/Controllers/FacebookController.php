<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {      
        $user = Socialite::driver('facebook')->user();      
        $finduser = User::where('social_id', $user->id)->first();
        if($finduser){ 
            Auth::login($finduser);
            return redirect('/home'); 
        }
        else
        {
                $newUser = User::create([
                    'first_name'=>$user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'facebook',
                    'avatar' => $user->avatar,
                ]);  
                Auth::login($newUser);    
                return redirect('/home');
            }
    }
}
