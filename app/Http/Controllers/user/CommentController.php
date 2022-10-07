<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\user\CommentRequest;

class CommentController extends Controller
{
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
        $comments = Comment::where('video_id',$request->videoid)->get();
        return response()->json(['status'=>200,'data'=>$comments]);
    }
}
