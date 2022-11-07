<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Models\Video;

class CategoryController extends Controller
{
    public function categoryShow()
    {
        return view('admin.category');
    }

    public function categoryCreate(request $req)
    {
        $validator = Validator::make($req->all(),['name'=>'required|alpha|unique:categories,name']);
        if($validator->fails())
        {
           $return =['status'=>false,'errors'=>$validator->errors(),];
        }
        else {
            $category= Category::insert([
                'name'=>$req['name'],
                'status'=> '1' ,
            ]);
            if($category)
            {
                $return = ['status'=>true,'data'=>'inserted Successfull',];
            }
        }
        return response()->json($return);
    }

    public function categoryData()
    {
        $category = Category::all();
        return response()->json(['status'=>true,'data'=>$category,]);
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return response()->json(['status'=>true,'data'=>$category,]);
    }

    public function categoryUpdate(Request $req,$id)
    {
        $validator =Validator::make($req->all(),['name'=>'required|alpha|unique:categories,name']);
        if($validator->fails())
        {
            $return = ['status'=>false,'errors'=>$validator->errors(),];
        }
        else {
            $category = Category::find($id)->update(['name'=>$req['name'],]);
            if($category)
            {
                $return = ['status'=>true,'data'=>'Category Updated',];
            }
        }
        return response()->json($return);
    }


    public function categoryDelete($id)
    {
        $category = Category::find($id)->delete();
        if($category)
        {
            return response()->json(['status'=>true,'data'=>'Category Deleted',]);
        }
    }

    
    public function categoryStatus(Request $request)
    {
        $category_id = Category::find($request->id);
        $video = Video::where('category_id', $request->id)->get();   
        if(isset($category_id) && !empty($category_id))
        {
            if($category_id->status=='1')
            {
                 $category_id->status='0';
                 foreach($video as $v)
                 {
                    $v->status = '0';
                     $v->update();
                 }                
            }
            else {
                $category_id->status='1';
                foreach($video as $v)
                 {
                    $v->status = '1';
                    $v->update();
                 }  
            }
             $category_id->update();
            
             return response()->json(['status'=>200]);
        } 
       
    }

}
