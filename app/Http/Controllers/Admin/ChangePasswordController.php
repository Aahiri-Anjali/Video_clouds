<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function viewChangepassword()
    {
        return view('admin.changepassword');
    }

    public function changepassword(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'currentpassword' => 'required|min:8',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'required|min:8|same:newpassword',
        ]);

         $adminpass = Auth::guard('admin')->user()->password;
         $currentpass=$req['currentpassword'];

        if($validator->fails())
        {
            return response()->json([
                'status'=>false,
                'errors' => $validator->errors(),
                'admin'=>$adminpass,
            ]);
        }
        if(Hash::check($currentpass,$adminpass))
        {
            $update = Auth::guard('admin')->user()->update([
                'password'=>Hash::make($req['newpassword']),
            ]);
            return response()->json([
                'status'=>true,
                'data'=>"You have Successfully changed your password",
            ]);
        }
        else{
            return response()->json([
                'status'=>'false',
                'error'=>"Curren Password is Incurrect",
            ]);
        }

    }
}
