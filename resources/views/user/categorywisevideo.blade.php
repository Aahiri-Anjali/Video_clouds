{{-- @extends('layouts.app') --}}
@extends('layouts.front_main')

@push('link')
<style type="text/css">
/* #video_list{
    margin-left: "200px";
} */
</style>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-7">
            <video height="500" width="700" controls><source src="{{$lastvideo->video}}" type="video/mp4" /></video> 
                <br><br>
                 <div class="col-lg-8">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="row">
                            <center><b><h3>Video Details</h3></b></center>
                            <br>
                          <div class="col-sm-3">
                            <p class="mb-0">Video Title</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->title}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Upload Type</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->upload_type}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Video Link</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->link}}</p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Video Description</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$lastvideo->description}}</p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Video Hashtag</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">{{$lastvideo->hashtags}}</p>
                            </div>
                          </div>
                          <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Video Slug</p>
                          </div>
                          <div class="col-sm-9">
                            <p class="text-muted mb-0">{{$lastvideo->slug}}</p>
                          </div>
                        </div>
                      </div>
                    </div>                     
                </div>  
        </div>

            <div class="col-lg-5">
                @foreach($videos as $video)
                <video height="300" width="500" controls><source src="{{$video->video}}" type="video/mp4" /></video>  
                @endforeach        
            </div>
    </div>  

@endsection


