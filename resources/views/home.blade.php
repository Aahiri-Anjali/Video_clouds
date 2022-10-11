{{-- @extends('layouts.app') --}}
@extends('layouts.front_main')

@push('link')
<style type="text/css">
.lastvideo{
    height: relative;
    width: 900px;
}
.last_v{
  height: relative;
    width: 500px;
}
#center{
    text-align: center;
    /* margin-left: 700px; */
}
.mb-0
{
  font-size:20px;
}
.video_border{
  border : red;
}
.fa-bars,.fa-video{
  color:red;
}
</style>
{{-- style="background-color: #f8f9fa;" --}}
@endpush
@section('content')
<div class="row">
  <div class="col-lg-7">
    <a href="{{route('videoDetails',['id'=>$lastvideo->id])}}"><video class="video_border" height="600" width="900" controls><source src="{{$lastvideo->video}}" type="video/mp4" /></video></a>
          <div class="card lastvideo">
            <div class="card-body">
              <div class="col-sm-3">
                <center>
                  <p class="mb-0">{{$lastvideo->title}}</p>
                </center>
              </div>
            </div>
          </div>
  </div>
  <div class="col-lg-5">
    @foreach($lastvideos as $last_v)
    <a href="{{route('videoDetails',['id'=>$last_v->id])}}"><video height="300" width="500" controls><source src="{{$last_v->video}}" type="video/mp4" /></video></a>
      <div class="card last_v">
        <div class="card-body">
          <div class="col-sm-3">
            <center>
              <p class="mb-0">{{$last_v->title}}</p>
            </center>
          </div>
        </div>
      </div>  
    @endforeach      
  </div>
</div>

    <div class="card">               
      <div class="card-body p-4 text-black">      
          <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="lead fw-normal mb-0"><i class="fa-solid fa-video"></i>  <strong>All Videos CategoryWise</strong></p>
          </div>
        <div class="row g-2">
          @foreach($latestcategories as $key => $category)
          <div class="row">          
            <div class="col">
              @php $cat = @$category[$key]; @endphp
              <span><h4><i class="fa-solid fa-bars"></i>  {{@$cat->category->name}}</h4></span>
            </div> 
          </div>
            @foreach($category as $c)
            <div class="col mb-2">
              <a href="{{route('videoDetails',['id'=>$c->id])}}"><video height="300" width="500" controls><source src="{{$c->video}}" type="video/mp4" /></video></a>
                <div class="card last_v">
                  <div class="card-body">                    
                    <div class="col-sm-9">
                      <center>                     
                        <p class="mb-0"><i class="fa-brands fa-cuttlefish"></i>    {{$c->title}}</p>
                        <p class="mb-0"><i class="fa-solid fa-calendar-days"></i>    {{$c->published_at}}</p>
                        <p class="mb-0"><i class="fa-solid fa-hashtag"></i>    {{$c->hashtags}}</p>
                        <p class="mb-0"><i class="fa-solid fa-audio-description"></i>    {{$c->description}}</p>
                      </center>
                    </div>
                  </div>
                </div>   
            </div>
            @endforeach
            @endforeach  
        </div>
      </div>
    </div>

@endsection


