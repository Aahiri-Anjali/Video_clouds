<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Image;
use Illuminate\Support\Facades\File; 
use App\Models\Video; 


class ImageController extends Controller
{
    public function imageDelete(Request $request)
    {
        $videos = Video::find($request->video_id);
        $image_id = Image::where('id',$request->id)->first();
        if(isset($image_id) && !empty($image_id))
        {
            $image_id->delete();
            File::delete(public_path() . '/upload/'. $image_id->getRawOriginal('image')); 
            $images = Image::where('video_id',$request->video_id)->get();
            return response()->json(['status'=>200,'data'=>$videos,'images'=>$images]);
        }
       
    }
}
