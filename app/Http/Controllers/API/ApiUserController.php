<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  App\Models\ApiUser;
use  App\Models\User;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;



class ApiUserController extends Controller
{
    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function createStripe()
    {
        // echo "in";
        $stripe = new \Stripe\StripeClient(
            'sk_test_51M2obIILFiwzPDQAuZdBxGP92yGLo2j4RtpFZ7vgzUKMX9VZwnFEMQbebNH7DVtes0U4YCkBZ4KnSlYpZpekNqRI00gmRGAqCM'
        );
       
        $customers = $stripe->customers->create([
            'description' => 'My First Test Customer (created for API docs at https://www.stripe.com/docs/api)',
        ]);
         
        $token = $stripe->tokens->create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 11,
                'exp_year' => 2023,
                'cvc' => '314',
            ],
        ]);
       
        $customer_charge = $stripe->charges->create([
                'amount' => 2000,
                'currency' => 'usd',
                'source' => $token->id,
                'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
        ]);
        dd($customer_charge);
        
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
                                    'name'=>'required',
                                    'email'=>'required|email|unique:api_users',
                                    'password'=>'required|min:8',
                                    ]);

        if($validate->fails())
        {
            return response()->json(['errors'=>$validate->errors()]);
        }
        else
        {
            $user = ApiUser::create(['name'=>$request->name,
                                     'email'=>$request->email,
                                     'password'=>Hash::make($request->password),
                                    ]);
            $accessToken = $user->createToken('Token')->accessToken;
            return response([ 'user' => $user, 'user_token' => $accessToken]);
        }

    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email'=>'required|email|exists:api_users,email','password'=>'required|min:8'
            ]);

        if($validate->fails())
        {
            return response()->json(['errors'=>$validate->errors()]);
        }

        $data = ['email'=>$request['email'],
          'password'=>$request['password']];
        if(auth()->guard('api_attempt')->attempt($data))
        {
            $token = auth()->guard('api_attempt')->user()->createToken('token')->accessToken;
            return response()->json(['token'=>$token]);
        }else{
            return response()->json(['data'=>"you are not authorized"]);
        }
       
    }

    // public function userDetail(Request $request)
    // {   
    //     $user = auth()->guard('api')->user();
    //     return response()->json(['data'=>$user]);    
    // }

    public function userloginApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email','password'=>'required|min:8'
            ]);

        if($validate->fails())
        {
            return response()->json(['errors'=>$validate->errors()]);
        }
        // $user = User::where('email', $request->email)->first();
        $data = ['email'=>$request['email'],
          'password'=>$request['password']];
        if(auth()->attempt($data))
        {
            $token = auth()->user()->createToken('token')->accessToken;
            return response()->json(['token'=>$token]);
        }else{
            return response()->json(['data'=>"you are not authorized"]);
        }
    }

    public function userDetail(Request $request)
    {   
        $user = auth()->guard('web_user')->user();
        return response()->json(['data'=>$user]);    
    }

    public function userInfoApi()
    {
       $data = $this->userRepository->getUserinfoApi();
       $categories = Category::all();
        return response()->json(['data'=>$data,'category'=>$categories]);        
    }

    public function userInfoUpdateApi(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(),['first_name'=>'required',
                                                    'last_name'=>'required|alpha',
                                                    'mobile'=>'required|numeric|digits:10|starts_with:6,7,8,9',
                                                    'country'=>'required|alpha',
                                                    'state'=>'required|alpha',
                                                    'city'=>'required|alpha',
                                                    'address'=>'required',
                                                    'image'=>'image'
                                                ]);
        if($validate->fails())
        {
            return response()->json(['errors'=>$validate->errors()]);
        }
        $user = User::where('id', Auth::guard('web_user')->user()->id)->first();
        $existimage = $user->getRawOriginal('image');
        // dd($user);
        if($request->hasFile('image')){
            $filename = time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/upload/',$filename);
        }
        
        $update = $user->update(['first_name'=>$request['first_name'],
                              'last_name'=>$request['last_name'],
                              'mobile'=>$request['mobile'],
                              'country'=>$request['country'],
                              'state'=>$request['state'],
                              'city'=>$request['city'],
                              'address'=>$request['address'],
                              'image'=>$filename ?? $existimage,
                            ]);
        if($update)
        {
            return response()->json(['success'=>'updated']);
        }
        else{
            return response()->json(['error'=>'not updated']);
        }

    }

    public function submitChangePasswordApi(Request $request)
    {
        $validate = Validator::make($request->all(),['currentpassword' => 'required|min:8',
                                                    'newpassword' => 'required|min:8',
                                                ]);
        if($validate->fails())
        {
            return response()->json(['errors'=>$validate->errors()]);
        }

        $user = User::where('id',Auth::guard('web_user')->user()->id)->first();
        $userpass = $user->password;
        $newpass = $request['newpassword'];
        $currentpass = $request['currentpassword'];
        if(Hash::check($currentpass,$userpass))
        {
            if($newpass == $currentpass)
            {
                return response()->json(['error'=>"New password and Current password can not be same"]);
            }
            else{
                $user->update(['password'=>Hash::make($request['newpassword'])]);
                return response()->json(['success'=>"Password Changed SuccessFully"]);
            }
            
        }
        else{
            return response()->json(['error'=>"Current Password doesn't match"]);          
        }       
    }

    public function categoryWiseVideoApi($id)
    {
        $data = $this->userRepository->getUserinfoApi();
        $categories = Category::all();
        $videos = $this->userRepository->getCategoryWiseVideo($id);
        $lastvideo = $this->userRepository->getLastVideo($id);   
        return response()->json(['data'=>[$data,$categories,$videos,$lastvideo]]);
    }

    public function videoDetailsApi($id)
    {
        $data = $this->userRepository->getUserinfoApi();
        $categories = Category::all();
        $like = Like::where('video_id',$id)->where('user_id',$data->id)->first();
        $video = $this->userRepository->getvideoDetails($id);
        return response()->json(['data'=>[$data,$categories,$like,$video]]);
    }

    public function commentsApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required',
            'user_id'=>'required',
            'comment'=>'required',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $comment = Comment::insert(['video_id'=>$request->video_id,
                                    'user_id'=> $request->user_id,
                                    'comment'=>$request->comment
                                  ]);
        if(isset($comment))
        {
            return response()->json(['status'=>200,'success'=>'Comment sent just']);
        }
    }

    public function showCommentsApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            'user_id'=>'required|numeric',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $comments = Comment::with('user')->where('video_id',$request->video_id)->where('user_id','!=',$request->user_id)->get();
        $usercomments = Comment::with('user')->where('video_id',$request->video_id)->where('user_id',$request->user_id)->orderBy('id','desc')->get();
        $loggedid = Auth::guard('web_user')->user()->id;
        // dd($comments);
        return response()->json(['data'=>[$comments,$usercomments,$loggedid]]);
    }

    public function likeApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            'user_id'=>'required|numeric',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $like = Like::updateOrCreate(['user_id'=>$request->user_id,
                                    'video_id'=>$request->video_id],
                                    ['video_status'=>'like',]);
        if(isset($like))
        {
            return response()->json(['status'=>200,'success'=>'Video is liked']);
        }
    }

    public function dislikeApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            'user_id'=>'required|numeric',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $dislike = Like::updateOrCreate(['user_id'=>$request->user_id,
                                         'video_id'=>$request->video_id],
                                         ['video_status'=>'dislike',]);
        if(isset($dislike))
        {
            return response()->json(['status'=>200,'success'=>'Video is disliked']);
        }
    }

    public function countLikesApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $likes = Like::where('video_id',$request->video_id)->where('video_status','like')->get();
        $countlikes = count($likes);
        return response()->json(['status'=>200,'data'=>$countlikes]);
    }

    public function countDislikesApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $dislikes = Like::where('video_id',$request->video_id)->where('video_status','dislike')->get();
        $countdislikes = count($dislikes);
        return response()->json(['status'=>200,'data'=>$countdislikes]);
    }

    public function removeLikeApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'video_id'=>'required|numeric',
            'user_id'=>'required|numeric',
            'video_status'=>'required',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        if(!is_null($request->video_id) && !is_null($request->user_id))
        {
            if($request->video_status == "like")
            {
                $removelike = Like::where('video_id',$request->video_id)->where('user_id',$request->user_id)->where('video_status','like')->first();
                $deletelike = $removelike->delete();
            }
            if($request->video_status == "dislike")
            {
                $removedislike = Like::where('video_id',$request->video_id)->where('user_id',$request->user_id)->where('video_status','dislike')->first();
                $deletedislike = $removedislike->delete();
            }
            return response()->json(['status'=>200,'data'=>'removed']);
        }
        else
        {
            return response()->json(['data'=>'data is null']);
        }   
    }

    public function updateCommentApi(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'comment_id'=>'required|numeric',
            'comment'=>'required',
            ]);

        if($validate->fails())
        {
        return response()->json(['errors'=>$validate->errors()]);
        }

        $updateid = Comment::where('id',$request->comment_id)->first();
        $update = $updateid->update(['comment'=>$request->comment]); 
        return response()->json(['status'=>200,'data'=>'Updated']);
    }





}
