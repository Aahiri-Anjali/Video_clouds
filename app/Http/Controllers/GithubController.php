<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGithub()
    {     
        
        $user = Socialite::driver('github')->stateless()->user();
        // dd($user);
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
                        'last_name'=>null,
                        'email' => $user->email,
                        'social_id'=> $user->id,
                        'social_type'=> 'github',
                        'avatar' => $user->avatar,
                    ]
                );  
                Auth::login($newUser);    
                return redirect('/home');
        }
    }
}
