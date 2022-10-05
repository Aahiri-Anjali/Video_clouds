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

    <div class="row mb-7">
        <div class="col-lg-7">
            <video height="500" width="700" controls><source src="{{$lastvideo->video}}" type="video/mp4" /></video>    
        </div>  
        <div class="col-lg-5">
            @foreach($videos as $video)
            <video height="300" width="500" controls><source src="{{$video->video}}" type="video/mp4" /></video>  
            @endforeach        
        </div>
    </div>  

    


@endsection


