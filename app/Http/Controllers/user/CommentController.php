<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\user\CommentRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function comments(CommentRequest $request)
    {
        $comment = Comment::insert(['video_id'=>$request->videoid,
                                    'user_id'=> $request->userid,
                                    'comment'=>$request->comment
                                  ]);
        if(isset($comment))
        {
            return response()->json(['status'=>200,'success'=>'Comment sent just']);
        }
    }

    public function showComments(Request $request)
    {
        $comments = Comment::with('user')->where('video_id',$request->videoid)->where('user_id','!=',$request->userid)->get();
        $usercomments = Comment::with('user')->where('video_id',$request->videoid)->where('user_id',$request->userid)->orderBy('id','desc')->get();
        $loggedid = Auth::user()->id;
        // dd($usercomments);
        return response()->json(['status'=>200,'users'=>$comments,'usercomments'=>$usercomments,'loggedid'=>$loggedid]);
    }

    public function updateComment(Request $request)
    {
        $updateid = Comment::where('id',$request->commentid)->first();
        $update = $updateid->update(['comment'=>$request->comment]); 
        return response()->json(['status'=>200,'data'=>'Updated']);
    }
}
