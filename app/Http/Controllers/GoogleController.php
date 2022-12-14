<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect(); 
    }

    public function callbackFromGoogle()
    {      
        $user = Socialite::driver('google')->stateless()->user();      
        $finduser = User::where('social_id', $user->id)->first();

        if($finduser){ 
            Auth::login($finduser);
            return redirect('/home'); 
        }
        else
        {
                $newUser = User::create(
                    [
                        'first_name'=>$user->name,
                        'email' => $user->email,
                        'social_id'=> $user->id, 
                        'social_type'=> 'google',
                        'avatar' => $user->avatar,
                    ]
                );  
                Auth::login($newUser);    
                return redirect('/home');
        }
    }
}

