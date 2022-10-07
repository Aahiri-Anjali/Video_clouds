@extends('layouts.front_main')

@push('link')
<link href="{{asset('css/user/videodetail.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
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
                          <h6 class="fw-bold text-primary mb-1">{{$data->first_name}} {{$data->last_name}}</h6>
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
                        <a class="d-flex align-items-center me-3">
                          @if(isset($like->video_id) && isset($like->user_id))
                          @if($like->video_status == 'like')
                            <i class="fa-solid fa-thumbs-up" id="like"></i>
                          @else
                            <i class="like fa-regular fa-thumbs-up" id="like"></i>
                          @endif
                          @else
                          <i class="like fa-regular fa-thumbs-up" id="like"></i>
                          @endif
                          <p class="mb-0">Like</p>&nbsp;&nbsp;
                          <span class="mb-0" id="countlikes"></span>
                        </a>

                        <a href="#!" class="d-flex align-items-center me-3">
                          @if(isset($like->video_id) && isset($like->user_id))
                          @if($like->video_status == 'dislike')
                            <i class="fa-solid fa-thumbs-down" id="dislike"></i>
                          @else
                            <i class="dislike fa-regular fa-thumbs-down" id="dislike"></i>
                          @endif
                          @else
                          <i class="dislike fa-regular fa-thumbs-down" id="dislike"></i>
                          @endif
                          <p class="mb-0">Dislike</p>&nbsp;&nbsp;
                          <span class="mb-0" id="countdislikes"></span>
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
                    <form>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                      <div class="d-flex flex-start w-100">
                        <input type="hidden" id="userid" value="{{$data->id}}">
                        <input type="hidden" id="videoid" value="{{$video->id}}">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="{{$data->image}}" alt="avatar" width="40"
                          height="40" />
                        <div class="form-outline w-100">
                            <label class="form-label" for="textAreaExample">{{$data->first_name}} {{$data->last_name}}</label>
                          <textarea class="form-control" id="textarea" rows="4" name="comment"
                            style="background: #fff;" placeholder="Enter Comment"></textarea>
                            <span class="text-danger error_danger" id="commenterror"></span>

                        </div>
                      </div>
                        <button type="submit" id="comment" class="btn btn-primary btn-sm">Post comment</button>
                        <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                    </div>
                    </form>  
                  </div>
                </div>
              </div>
              <div id="showcomments"></div> 
        </div>
    </div>
    </div>
</div>
</div>
@endsection

@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script>
$(document).ready(function(){
      commentsall();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        countlikes();
        countdislikes();

        $(document).on('click','#comment',function(e){
            e.preventDefault();
            var comment = $('#textarea').val();
            var userid = $('#userid').val();
            var videoid= $('#videoid').val();
            $('#commenterror').text('');
            $(document).find('.error_danger').text('');
            $.ajax({
                url:"{{route('comments')}}",
                type:"post",
                dataType:"json",
                data:{
                    comment:comment,
                    userid:userid,
                    videoid:videoid,
                },
                beforeSend:function() {
                      $(document).find('.error_danger').text('');
                    },
                success:function(response){
                    $('#commenterror').text('');
                    console.log(response.success);
                    if(response.status == 200)
                    {
                      $('#textarea').val('');
                      toastr.success(response.success); 
                      commentsall();             
                    }
                },
                error:function(response){
                    $.each(response.responseJSON.errors, function(key,value)
                    {
                        $('#commenterror').text(value);
                    });
                },
            });
        });

        function commentsall()
        {
          var videoid= $('#videoid').val();
              $.ajax({
                    url:"{{route('showComments')}}",
                    type:"get",
                    dataType:"json",
                    data:{videoid:videoid},
                    success:function(response){
                      console.log(response.data);
                      if(response.status == 200)
                      {
                        $('#showcomments').html('');
                        $.each(response.data, function(key,value)
                        {
                          $('#showcomments').append('<div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">\
                            <div class="d-flex flex-start w-100">\
                            <img class="rounded-circle shadow-1-strong me-3" src="{{$data->image}}" alt="avatar" width="40" height="40" />\
                            <div class="form-outline w-100">\
                                <label class="form-label" for="textAreaExample">{{$data->first_name}} {{$data->last_name}}</label>\
                              <textarea class="form-control show" rows="4" name="comment"\
                                style="background: #fff;" placeholder="Enter Comment">'+value.comment+'</textarea>\
                            </div>\
                          </div>\
                          </div>');
                        });    
                    }
                  },
                });
        }

        $(document).on('click','.like',function(){
              var userid = $('#userid').val();
              var videoid= $('#videoid').val();
              $.ajax({
                url:"{{route('like')}}",
                type:"post",
                dataType:"json",
                data:{userid:userid,
                      videoid:videoid,
                },
                success:function(response){
                  if(response.status == 200)
                  {
                    toastr.success(response.success); 
                    countlikes();
                    countdislikes();
                    $('.like').attr('class','fa-solid fa-thumbs-up');
                    $('#dislike').attr('class','dislike fa-regular fa-thumbs-down');
                  }
                },
              });
        });

        $(document).on('click','.dislike',function(){
              var userid = $('#userid').val();
              var videoid= $('#videoid').val();
              $.ajax({
                url:"{{route('dislike')}}",
                type:"post",
                dataType:"json",
                data:{userid:userid,videoid:videoid},
                success:function(response){
                  if(response.status == 200)
                  {
                    toastr.error(response.success); 
                    countlikes();
                    countdislikes();
                    $('.dislike').attr('class','fa-solid fa-thumbs-down');
                    $('#like').attr('class','like fa-regular fa-thumbs-up');
                  }
                }
              });
        });

        function countlikes()
        {
            var videoid= $('#videoid').val();
            $.ajax({
              url:"{{route('countLikes')}}",
              type:"post",
              dataType:"json",
              data:{videoid:videoid},
              success:function(response){
                if(response.status == 200)
                {
                  $('#countlikes').text(response.data);
                }
              },
            });
        }

        function countdislikes()
        {
            var videoid= $('#videoid').val();
            $.ajax({
              url:"{{route('countDislikes')}}",
              type:"post",
              dataType:"json",
              data:{videoid:videoid},
              success:function(response){
                if(response.status == 200)
                {
                  $('#countdislikes').text(response.data);
                }
              }
            });
        }
});
</script>
@endpush