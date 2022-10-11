{{-- @extends('layouts.app') --}}
@extends('layouts.front_main')

@push('link')
<style type="text/css">
.last_v{
  height: relative;
    width: 500px;
}
</style>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-7">
          <a href="{{route('videoDetails',['id'=>$lastvideo->id])}}"><video height="500" width="700" controls><source src="{{$lastvideo->video}}" type="video/mp4" /></video></a> 
                <br><br>
                 <div class="col-lg-8">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="row">
                            <center><b><h3>Video Details</h3></b></center>
                            <br>
                          <div class="col-sm-3">
                            <p class="mb-0">Video Title <i class="fa-brands fa-cuttlefish"></i></p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->title}}</p>
                          </div>
                        </div>
                        <hr>                    
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Publish Date <i class="fa-solid fa-calendar-days"></i></p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->published_at}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Video Link   <i class="fa-solid fa-link"></i></p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->link}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Description <i class="fa-solid fa-audio-description"></i></p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$lastvideo->description}}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Video Hashtag <i class="fa-solid fa-hashtag"></i></p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$lastvideo->hashtags}}</p>
                            </div>
                          </div>
                          <hr>              
                      </div>
                    </div>                     
                </div>  
        </div>

            <div class="col-lg-5">
              <h3> Related Videos</h3>
                @foreach($videos as $video)
                <a href="{{route('videoDetails',['id'=>$video->id])}}"><video height="300" width="500" controls><source src="{{$video->video}}" type="video/mp4" /></video></a>  
                  <div class="card last_v">
                    <div class="card-body">                    
                      <div class="col-sm-9">
                        <center>                     
                          <p class="mb-0"><i class="fa-brands fa-cuttlefish"></i>    {{$video->title}}</p>
                          <p class="mb-0"><i class="fa-solid fa-calendar-days"></i>    {{$video->published_at}}</p>
                          <p class="mb-0"><i class="fa-solid fa-hashtag"></i>    {{$video->hashtags}}</p>
                          <p class="mb-0"><i class="fa-solid fa-audio-description"></i>    {{$video->description}}</p>
                        </center>
                      </div>
                    </div>
                  </div>   
                @endforeach        
            </div>
    </div>  

@endsection


