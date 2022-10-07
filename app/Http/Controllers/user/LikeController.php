<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = Like::updateOrCreate(['user_id'=>$request->userid,
                                    'video_id'=>$request->videoid],
                                    ['video_status'=>'like',]);
        if(isset($like))
        {
            return response()->json(['status'=>200,'success'=>'Video is liked']);
        }
    }

    public function dislike(Request $request)
    {
        $dislike = Like::updateOrCreate(['user_id'=>$request->userid,
                                         'video_id'=>$request->videoid],
                                         ['video_status'=>'dislike',]);
        if(isset($dislike))
        {
            return response()->json(['status'=>200,'success'=>'Video is disliked']);
        }
    }

    public function countLikes(Request $request)
    {
        $likes = Like::where('video_id',$request->videoid)->where('video_status','like')->get();
        $countlikes = count($likes);
        return response()->json(['status'=>200,'data'=>$countlikes]);
    }

    public function countDislikes(Request $request)
    {
        $dislikes = Like::where('video_id',$request->videoid)->where('video_status','dislike')->get();
        $countdislikes = count($dislikes);
        return response()->json(['status'=>200,'data'=>$countdislikes]);
    }
}
