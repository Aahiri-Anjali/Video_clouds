{{-- @extends('layouts.app') --}}
@extends('layouts.front_main')

@push('link')
<style type="text/css">
.card{
    height: relative;
    width: 1800px;
}
.mb-5{
    margin-top: 270px;
    /* width: 100px; */
}
#center{
    text-align: center;
    /* margin-left: 700px; */
}
.video{
    margin-left:500px;
    /* position:fixed; */
}
.color{
    color : white;
}
.width{
    width:"300px";
}
.red{
    color : red;
}
</style>
{{-- style="background-color: #f8f9fa;" --}}
@endpush
@section('content')
<div class="card">
<div class="col col-lg-9 col-xl-8">
    <div class="card">
      <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
        {{-- <center><p><h3 id="center" class="float-end">All Videos</h3></p></center> --}}
                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <video class="video" height="700" width="700" style="z-index: 1" controls><source src="{{$lastvideo->video}}" type="video/mp4" /></video>    
                </div>
      </div>

      <div class="card-body p-4 text-black">
        <center class="width">
        <div class="mb-5 color" style="background-color: #000;" >
          <div class="p-4" >
            <div class="row">
                <center><p><h3><u>Video Details</u></h3></p></center>
                <div class="col-sm-3">
                    <p class="mb-0">Video Title</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="mb-0 red">{{$lastvideo->title}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Upload Type</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="mb-0 red">{{$lastvideo->upload_type}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Video Link</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="mb-0 red">{{$lastvideo->link}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Video Description</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="mb-0 red">{{$lastvideo->description}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0">Video Hashtag</p>
                      </div>
                      <div class="col-sm-9">
                        <p class="mb-0 red">{{$lastvideo->hashtags}}</p>
                      </div>
                    </div>
                    <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Video Slug</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="mb-0 red">{{$lastvideo->slug}}</p>
                    </div>
                  </div>
          </div>
        </div>
        </center>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <p class="lead fw-normal mb-0">All Videos</p>
        </div>
        <div class="row g-2">
            @foreach($videos as $video)
            <div class="col mb-2">
              <video height="300" width="500" controls><source src="{{$video->video}}" type="video/mp4" /></video>  
            </div>
          @endforeach   
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


