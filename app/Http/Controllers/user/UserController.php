<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;


class UserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function userInfo()
    {
       $data = $this->userRepository->getUserinfo();
       $categories = Category::all();
       return view('user.userdetail',compact('data','categories'));
    }

    public function userInfoUpdate(UserUpdateRequest $request)
    {
        // return $validator = $request->validated();
        $user = User::where('id', Auth::user()->id)->first();
        $existimage = $user->getRawOriginal('image');

        if($request->hasFile('image')){
            $filename = time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/upload/',$filename);
        }
        
        $update = $user->update(['first_name'=>$request['fname'],
                              'last_name'=>$request['lname'],
                              'mobile'=>$request['mobile'],
                              'country'=>$request['country'],
                              'state'=>$request['state'],
                              'city'=>$request['city'],
                              'address'=>$request['address'],
                              'image'=>$filename ?? $existimage,
                            ]);

        if($update)
        {
            return back()->with('success',"Updated SuccessFully");
        }
        else{
            return back()->with('error'," Not Updated");
        }

    }

    public function changePassword()
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        return view('user.changepassword',compact('data','categories'));
    }

    public function submitChangePassword(ChangePasswordRequest $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $userpass = $user->password;
        // print_r($userpass);
        $newpass = $request['newpassword'];
        $currentpass = $request['currentpassword'];
        if(Hash::check($currentpass,$userpass))
        {
            if($newpass == $currentpass)
            {
                return back()->with('error',"New password and Current password can not be same");
            }
            else{
                $user->update(['password'=>Hash::make($request['newpassword'])]);
                return back()->with('success',"Password Changed SuccessFully");
            }
            
        }
        else{
            return back()->with('error',"Current Password doesn't match");
        }       
    }

    public function categoryWiseVideo($id)
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        // $category = Category::find('id',$id);
        $videos = $this->userRepository->getCategoryWiseVideo($id);
        $lastvideo = $this->userRepository->getLastVideo($id);   
        return view('user.categorywisevideo',compact('videos','data','categories','lastvideo'));
    }

    public function videoDetails($id)
    {
        $data = $this->userRepository->getUserinfo();
        $categories = Category::all();
        $video = $this->userRepository->getvideoDetails($id);
        // $category_id = $video->category_id;
        // $category = Category::find('id',$category_id);
        return view('user.videodetails',compact('video','data','categories'));
    }

}
