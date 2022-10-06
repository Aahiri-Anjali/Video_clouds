<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comments(Request $request)
    {
        $comment = Comment::insert(['video_id'=>$request->videoid,
                                    'user_id'=> $request->userid,
                                    'comment'=>$request->comment
                                  ]);
    }
}
