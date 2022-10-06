@extends('layouts.front_main')

@push('link')
<link href="{{asset('css/user/videodetail.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="row mb-7">
<div class="container">
    <div class="row">
    <div class="card">
        <div class="overlay d-none">
            <small class="fa fa-close"></small>
            {{-- <img src="https://i.imgur.com/WInwkB8.jpg"> --}}
        </div>
        <div class="top-div">
            <i class="fa fa-bars"></i>
            <i class="fa fa-envelope-o"></i>
        </div>
        <div class="image">
            <span><video height="500" width="700" controls><source src="{{$video->video}}" type="video/mp4" /></video></span>
        </div>
        <div class="arc">
            <span></span>
        </div>
        <div class="about">
            <div class="row">
            <center><p><h3><u>Video Details</u></h3></p></center>
            <div class="col-sm-3">
                <p class="mb-0">Video Title</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$video->title}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Upload Type</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$video->upload_type}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Video Link</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$video->link}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Video Description</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$video->description}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Video Hashtag</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$video->hashtags}}</p>
                  </div>
                </div>
                <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Video Slug</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$video->slug}}</p>
                </div>
              </div>
        </div>

              <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                  <div class="card comment">
                    <div class="card-body">
                      <div class="d-flex flex-start align-items-center">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="{{$data->image}}" alt="avatar" width="60"
                          height="60" />
                        <div>
                          <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                          <p class="text-muted small mb-0">
                            Shared publicly - Jan 2020
                          </p>
                        </div>
                      </div>
          
                      <p class="mt-3 mb-4 pb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                      </p>
          
                      <div class="small d-flex justify-content-start">
                        <a href="#!" class="d-flex align-items-center me-3">
                          <i class="far fa-thumbs-up me-2"></i>
                          <p class="mb-0">Like</p>
                        </a>
                        <a href="#!" class="d-flex align-items-center me-3">
                          <i class="far fa-comment-dots me-2"></i>
                          <p class="mb-0">Comment</p>
                        </a>
                        <a href="#!" class="d-flex align-items-center me-3">
                          <i class="fas fa-share me-2"></i>
                          <p class="mb-0">Share</p>
                        </a>
                      </div>
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                      <div class="d-flex flex-start w-100">
                        <input type="hidden" id="userid" value="{{$data->id}}">
                        <input type="hidden" id="videoid" value="{{$video->id}}">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="{{$data->image}}" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                            <label class="form-label" for="textAreaExample">Message</label>
                          <textarea class="form-control" id="textarea" rows="4"
                            style="background: #fff;" placeholder="Enter Comment"></textarea>
                        </div>
                      </div>
                        <button type="button" id="comment" class="btn btn-primary btn-sm">Post comment</button>
                        <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection

@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function(e){
        // e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#comment').click(function(){
            console.log('comment clicked');
            var comment = $('#textarea').val();
            var userid = $('#userid').val();
            var videoid= $('#videoid').val();
            console.log(videoid);
            $.ajax({
                url:"{{route('comments')}}",
                type:"post",
                dataType:"json",
                data:{
                    comment:comment,
                    userid:userid,
                    videoid:videoid,
                },
                success:function(){

                    // toastr.options.timeOut = 10000;
                    // @if (Session::has('error'))
                    //         toastr.error('{{ Session::get('error') }}');
                    // @elseif(Session::has('success'))
                    //     toastr.success('{{ Session::get('success') }}');
                    // @endif

                }
            });
        });
    });
</script>
@endpush