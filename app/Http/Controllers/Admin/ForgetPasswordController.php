<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Mail\OtpMail;

class ForgetPasswordController extends Controller
{
    public function forgetshow()
    {
        return view('admin.forget');
    }

    public function postforget(request $req)
    {
        $validate = $req->validate([
            'email'=>'required|email|exists:admins,email',
        ]);

        $req->session()->put('email',$req['email']);
        $token = Str::random(8);

        DB::table('password_reset')->insert([
            'email'=>$req['email'],
            'token'=>$token,
        ]);

        // Mail::send('emails.otpmail',['token' => $token],function($message) use($req){
        //     $message->to($req['email']);
        //     $message->subject('OTP varification');
        // });
        Mail::to($req['email'])->send(new OtpMail($token));

        return redirect()->route('admin.resetpass');
    }

    public function reset_password(request $req)
    {
        if($req->session()->has('email'))
        {
            return view('admin.resetpassword');
        }
    }

    public function reset_validate(request $req)
    {
        if($req->session()->has('email'))
        {
            $session = session('email');

             $validate  = $req->validate([
                'otp'=>'required',
                'password' => 'required|min:8',
                'cpassword' =>'required|same:password',
            ]);

            $reset = DB::table('password_reset')->where('email',$session)->get();
            // dd($reset);
            $token = $reset[0]->token;
            $password = Hash::make($req['password']);


            if($token == $req['otp'])
            {
                 Admin::where('email',$session)->update([
                    'password'=>$password,
                ]);
                DB::table('password_reset')->where('email',$session)->delete();
                $req->session()->flash('email');
            }
            else
            {
                return view('admin.resetpassword')->with('msg','OTP Does not mathch');
            }
            
            return redirect()->route('admin.login');
        }

       
    }

    public function resendotp(request $req)
    {
        if($req->session()->has('email'))
        {
            $session = session('email');
            DB::table('password_reset')->where('email',$session)->delete();
            $token = Str::random(8);
            DB::table('password_reset')->insert([
                'email'=>$session,
                'token'=>$token,
            ]);
            $send = Mail::to($session)->send(new OtpMail($token));
            // dd($send);
            if($send==null)
            {
                 return response()->json([
                    'status'=>true,
                    'data' => 'OTP is resent successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=>false,
                    'error'=>'Not sent',
                ]);
            }
                 
        }

    }

}
