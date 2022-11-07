<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\DataTables\VideoDataTable;
use App\Http\Requests\VideoUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;  
use  App\Models\Image;
use App\Http\Traits\CommonTrait;
// use Illuminate\Support\Facades\Input;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use CommonTrait;

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VideoDataTable $dataTable)
    {
        $categories = Category::where('status', '1')->get();
        return $dataTable->render('admin.video', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
       if($request->video_id){
            $exist_video = Video::where('id', $request->video_id)->first();
            $upload_type = $exist_video->upload_type;
            if($request->file('video'))
            {
                File::delete(public_path() . '/upload/'. $exist_video->getRawOriginal('video'));           
            }

            if($request['upload_type']=="upload_video")
            {
                $images = Image::where('video_id',$request->video_id)->get();
                if(isset($images))
                {
                    foreach($images as $image)
                    {                      
                        File::delete(public_path() . '/upload/'. $image->getRawOriginal('image'));
                        $image->delete();
                    }
                }
            }
       }
       else
       {
           $validator =  Validator::make($request->all(),['video'=>'required','upload'=>'required',]);
           if($validator->fails())
           {
               return response()->json(['status'=>false,'errors'=>$validator->errors()]);
           }
       }

       $filename ="";
       $upload = '';
       $extension = "";
       $files =array();
        if($request->file('video'))
        {                     
            foreach($request->file('video') as $file)
            {
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/upload/', $filename); 
                $extension = $file->getClientOriginalExtension();
                array_push($files, $filename);                                
            }  
            
            $array1 = array('jpg','jpeg','png');
            if(empty($upload) && $request['upload_type'] == "upload_image")
            {
                if(!in_array($extension,$array1))
                {
                    return response()->json(['status'=>422,'data'=>'Upload Valid images']);
                }       
            }
        } 
        else 
        {
            $upload = $exist_video->getRawOriginal('video');
        }
        $array = array('mp4','ogg','mp3');
        if(empty($upload) && $request['upload_type'] == "upload_video")
        {
            if(!in_array($extension,$array))
            {
                return response()->json(['status'=> 422,'data'=>'Upload Valid Video']);
            }
            if(count($request['video']) > 1)
            {
                return response()->json(['status'=>422,'data'=>'You can not send Multiple videos at a time']);
            }

        }

        $video = Video::updateOrCreate(
            ['id' => $request->video_id],
            ['title'=>$request['title'],
            'upload_type'=>$request['upload_type'] ,
            'video'=> !empty($upload) ? $upload : ($request['upload_type'] == 'upload_video' ? $filename : ''),
            'hashtags'=>$request['hashtag'],
            'description'=>$request['description'],
            'category_id'=>$request['category_type'],
            'published_at'=>$request['date'],
            'status'=>'1',
            'user_type'=>$request['user_type'],
            'link'=>Str::random(11),
        ]);

        
        if($video && $request->upload_type == "upload_image")
        {                 
            foreach($files as $f)
            {
                $images = new Image();
                $images->image = $f;
                $images->video_id = $video->id;
                $images->save();    
            }                                   
        }

           return response()->json(['status'=>200,'data'=>"Video Inserted"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Video::find($id);
        $images = Image::where('video_id',$id)->get();
        // dd($images);
        if(isset($videos))
        {
            return response()->json(['status'=>200,'data'=>$videos,'images'=>$images]);
        }
        else
        {
            return response()->json(['status'=>404,'data'=>'Data Not Found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, $id)
    {
        $video = Video::find($id);
        if($request->hasfile('video'))
        {
            $filename = time() . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path() . '/upload/', $filename);
            $video->video=$filename;
            $video->save();           
        }       
        if(isset($id))
        {
            $video->update(['title'=>$request['title'],
                            'hashtags'=>$request['hashtag'],
                            'description'=>$request['description'],
                            'category_id'=>$request['category_type'],
                            'published_at'=>$request['date'],
                            'user_type'=>$request['user_type'],
                           ]);

            $return = ['status'=>200,'data'=>'Data updated'];          
        }
        return response()->json($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $images = Image::where('video_id',$id)->get();
        if(isset($video))
        {
            if(isset($images))
            {
                foreach($images as $image)
                {
                    $image->delete();
                }              
            }           
            $video->delete();    

            return response()->json(['status'=>200,"data"=>"Trashed Successfully"]);
        }
    }

    public function videoModal(Request $request)
    {
        $video = $this->getVideoId($request->id); 
        $images = Image::where('video_id',$request->id)->get();
        if(isset($video) && !empty($video))
        {          
            return response()->json(['status'=>200,'data'=>$video, 'images'=>$images]);
        }
    }

    public function statusChange(Request $request)
    {
        $id = Video::where('id',$request->id)->first();
        if(isset($id) && !empty($id))
        {
            if($id->status == '0')
            {
                $id->status = '1';
            }else
            {
                $id->status = '0';
            }
            $id->save();
            return response()->json(['status'=>200]);
        }
    }

    public function videoTrashed(Request $request)
    {
        $trashedvideo = Video::onlyTrashed()->get();  
        return view('admin.trashedvideo',compact('trashedvideo'));
    }

    public function videoRestore($id)
    {
        $video = Video::withTrashed()->find($id);
        $images = Image::withTrashed()->where('video_id',$id)->get();
        if(!is_null($video))
        {
            $video->restore();
            if(!is_null($images))
            {
                foreach($images as $image)
                {
                    $image->restore();
                }
            }
        }
        return back();
    }

    
    public function videoDelete($id)
    {
        $video = Video::withTrashed()->find($id);
        $images = Image::withTrashed()->where('video_id',$id)->get();
        if(isset($video))
        {
            File::delete(public_path() . '/upload/'. $video->getRawOriginal('video'));
            if(isset($images))
            {
                foreach($images as $image)
                {
                    File::delete(public_path() . '/upload/'. $image->getRawOriginal('image'));                  
                    $image->forceDelete();
                }              
            }           
            $video->forceDelete();  
        }  
    }

    public function titleSearch(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $video = Video::select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
            return response()->json($video);
        }
    }
}


