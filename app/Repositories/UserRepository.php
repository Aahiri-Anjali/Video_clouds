<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface 
{
    public function getUserinfo()
    {
        return Auth::user();    
    }

    public function getCategoryWiseVideo($id)
    {
        return Video::where('upload_type','upload_video')->where('category_id',$id)->get();
    }

    public function getLastVideo($id)
    {
        return Video::where('upload_type','upload_video')->where('category_id',$id)->latest()->first();
    }

}