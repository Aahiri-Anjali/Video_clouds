<?php

namespace App\Http\Traits;
use App\Models\Video;

trait CommonTrait
{
     public function getVideoId($id)
     {
         return Video::where('id',$id)->first();
     }
}
