<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {      
        $user = Socialite::driver('google')->user();      
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
                    'social_type'=> 'google',
                    'avatar' => $user->avatar,
                ]);  
                Auth::login($newUser);    
                return redirect('/home');
            }
    }
}

