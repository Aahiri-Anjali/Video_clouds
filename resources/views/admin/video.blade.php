@extends('admin_layout.admin_main')

@push('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link href="{{Config::get('app.url')}}/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endpush

@section('content')

<button type="button" class="btn btn-primary" id="btn" data-toggle="modal" data-target="#myModal">
    Add Video
</button>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="video_insert_form">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upload Data</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="this.form.reset();">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-holder">
                            <div class="form-content">
                                <input type="hidden" name="user_type" id="user_type">
                                <input type="hidden" id="editid">
                                <div class="form-group">
                                    <label for="name">Video Title:</label>
                                    <input type="text" class="form-control" placeholder="Enter title" id="title" name="title">
                                </div>
                                <span class="text-danger error_danger" id="titleerror"></span>

                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                            <h6 class="mb-0 me-4">Upload Video or Images: </h6>
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="upload"
                                                    id="video_type" value="upload_video">
                                                <label class="form-check-label">Video</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="upload"
                                                    id="image_type" value="upload_image">
                                                <label class="form-check-label">Images</label>
                                            </div>
                                </div>
                                <span class="text-danger error_danger" id="uploaderror"></span>
             
                                <div class="form-group">
                                    <label>Upload Video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="video" name="video[]" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit_video_div"></div>
                                {{-- <video id="videosrc" height="200" width="300" controls>
                                   <source src="{{asset('/upload/1663751959animate.mp4')}}" type="video/mp4" />
                                </video> --}}

                                <span class="text-danger error_danger" id="videoerror"></span>
                                <span class="text-danger error_danger" id="type_error"></span>


                                <div class="form-group">
                                    <label>HashTags:</label>
                                    <input type="text" class="form-control" placeholder="Enter hashtag" id="hashtag" name="hashtag">
                                </div>
                                
                                <span class="text-danger error_danger" id="hashtagerror"></span>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter Text" name="description" id="description"></textarea>
                                </div>
                                <span class="text-danger error_danger" id="descriptionerror"></span>

                                <div class="form-group">
                                    <label for="pet-select">Choose Category Type:</label>
                                    <select name="category_type" id="category_type">
                                        <option>Select Category</option>
                                        @foreach($categories as $category) 
                                        <option value="{{$category->id}}" name="comedy">{{$category->name}}</option>
                                        @endforeach                                      
                                    </select>
                                </div>
                                <span class="text-danger error_danger" id="category_typeerror"></span>

                                <div class="form-group">
                                    <label>Publish Date:</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <span class="text-danger error_danger" id="dateerror"></span>

                                <!-- Modal footer -->
                                <div class="form-button">
                                    <button type="button" class="btn btn-primary" id="add_video" >Submit</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close" onclick="this.form.reset();">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- video show model --}}
<div class="modal" id="video_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="video_close" onclick="this.form.reset();">Close</button>
                </div>            
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-holder">
                            <div class="form-content video_div">        
                               
                            </div>
                        </div>
                    </div>
                </div>  
            </form>          
        </div>
    </div>
</div>


<div class="container">

    <table class="table table-border relod">
        <div class="row">
            <form role="form" method="POST" name="search_form" id="search_form">
                <div class="col-5">
                    <label class="form-label">Date Range</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" id="daterange" name="daterange" class="form-control" />
                    <span class="input-group-append">
                        <span class="input-group-text bg-light d-block">
                        <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                    </div>
                </div>
            </form>
            <div class="col-5">
                <label class="form-label"> Title </label>
                <div class="input-group date">
                    <select class="form-control" id="title-select">
                    </select>
                </div>
            </div>   
            <div class="col-2">
                <label></label>
                <div class="input-group date">
                    <button class="btn btn-primary" id="title_search">Search</button>&nbsp;
                    <button class="btn btn-secondary" id="clear">clear</button>

                </div>
            </div>
            <div class="col-2">
                <div class="input-group date">
                </div>
            </div>
      
        </div>

            <tbody>
                {!! $dataTable->table() !!}
            </tbody>
    </table>

</div>
@endsection

@push('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script src="{{Config::get('app.url')}}/node_modules/select2/dist/js/select2.min.js"></script>   --}}
   
{!! $dataTable->scripts() !!}
<script>
   
    $(document).ready(function() {
      
        $(function() {
            $('#daterange').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
               var date= $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
               $('#search_form').trigger('change');             
            });

            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                if($(this).val() == "")
                {
                    window.LaravelDataTables['videodatatable-table'].draw();
                }  
            });

            $('#search_form').on('change', function(e) {
                console.log("change in serach form"); 
                if (e.type == 'submit') {
                    e.preventDefault();
                }
                setTimeout(function() {
                    console.log("table draw called")
                    window.LaravelDataTables['videodatatable-table'].draw();
                }, 500);                                                
            });        
           
        });

        $('#videodatatable-table').on('preXhr.dt', function ( e, settings, data ) {
            data.daterange = $('#daterange').val(); 
            data.title_val = $('#title-select').val();
            console.log(data.title_val);
        });

        $(function() {
            $('#title-select').select2({
                placeholder: 'Search by title..',
                ajax:{
                    url:"{{route('admin.titleSearch')}}",
                    dataType:"json",
                    processResults:function(data)
                    {
                        return{
                            results: $.map(data,function(item){
                                return {
                                    text:item.title,
                                    id:item.title,
                                }
                            })
                        };
                    },
                    cache : true,                  
                },
            });

            $('#title_search').on('click',function(){                   
                setTimeout(function() {
                        window.LaravelDataTables['videodatatable-table'].draw();
                    }, 500);    
            });

            $('#clear').on('click',function(){
                $('#daterange').val('');
                $('#title-select').val('');
                $('.select2-selection__rendered').text('');
                window.LaravelDataTables['videodatatable-table'].draw();
            });
        });


        $('#video_close').click(function(){
            $('#video_modal').hide();
        });

        $("#myModal").on("hide.bs.modal", function() {
            $("#video_insert_form")[0].reset();
            $(".error_danger").text('');
        });
    

        $('.close,#close,#editclose').click(function() {
            $("#video_insert_form")[0].reset();
            $(".error_danger").text('');
            // $('#myModal').hide();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn').click(function(){
             $("#video_insert_form")[0].reset();
             $('#editid').val('');
             $('video').hide();
             $(".edit_video_div").html(''); 
             $(".error_danger").text('');
        });

        $(document).on('click','#add_video',function(e){
            e.preventDefault();
            var id = $('#editid').val();
            var upload_type = $('input[type="radio"]:checked').val();
            var form = $('#video_insert_form')[0];
            var data = new FormData(form);
            if(id){
                data.append('video_id', id);
            }
            if(!id){
             data.append('user_type', 0);
            }
            data.append('upload_type',upload_type);

            $.ajax({
                url: "{{route('admin.video.store')}}",
                type: "post",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend:function() {
                      $(document).find('span.error_danger').text('');
                    },
                success: function(response) {
                    if (response.status == 200) {
                        console.log('in success');
                        $('.close').click();
                        swal({
                            icon: "success",
                            text: response.data,
                            title: "inserted",
                        });
                        window.LaravelDataTables['videodatatable-table'].draw();                               
                    }
                    if(response.status==422)  
                    {
                        console.log(response.data);
                        $('#type_error').text(response.data);
                    }
                    if(response.status==false)
                    {
                         $.each(response.errors, function(key, value) {
                            var error = "#" + key + "error";
                            $(error).text(value);
                        });
                    }
                },
                error:function(response)
                {
                    $.each(response.responseJSON.errors, function(key,value)
                    {
                        var error = "#" + key + "error";
                         $(error).text(value);
                    });
                },
            });
        });

        $(document).on('click', '#edit', function(){           
                var id = $(this).val();
                $('video').show();
                $.ajax({
                    url: "/Admin/video/"+id+"/edit",
                    type: "get",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#user_type').val(response.data.user_type);
                            $("#editid").val(response.data.id);
                            $("#title").val(response.data.title);
                            if(response.data.upload_type=="upload_video")
                            {
                                $('#video_type').prop('checked',true);
                            }else{
                                $('#image_type').prop('checked',true);
                            }
                            var upload_type = response.data.upload_type;
                            console.log(upload_type);
                            if(upload_type == "upload_video")
                                {                                       
                                    $(".edit_video_div").html('<video height="200" width="300" controls><source src="'+response.data.video+'" type="video/mp4" /></video>');                                                                       
                                }                          
                            else
                            {
                                $(".edit_video_div").html('');
                                $.each(response.images,function(key,value)
                                {
                                    $(".edit_video_div").append('<i class="fa fa-close text-danger icon" id="'+value.id+'" video-id="'+response.data.id+'"><img src="'+value.image+'" height="100px" width="100px"></i>');
                                });
                            }                                                          
                            $("#hashtag").val(response.data.hashtags);
                            $('#description').val(response.data.description);
                            $('#category_type').val(response.data.category_id);
                            $('#date').val(response.data.published_at);
                        }
                    }
                });
        });


        $(document).on('click','#trash',function(e){
            e.preventDefault();
            id = $(this).val();
            swal({
                title: "Are you sure?",
                // text: "Once deleted, you will not be able to recover this Data!..",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
            .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    url:"/Admin/video/"+id,
                    type:"delete",
                    dataType:"json",
                    data:{id:id},
                    success:function(response)
                    {
                        console.log('in success');
                        if(response.status==200)
                        {
                            swal({
                                icon:"success",
                                text:response.data,
                                title:"Data Trashed"
                            });
                            window.LaravelDataTables['videodatatable-table'].draw();
                        }
                    }
                });
            }
            });
        });     

        $(document).on('click','#img',function(){
            $('#video_modal').show();
            var id = $(this).attr('value-id');
            console.log(id);
            $.ajax({
                url:"{{route('admin.videoModal')}}",
                type:"post",
                dataType:"json",
                data:{id:id},
                success:function(response){
                    console.log('in success');
                    console.log(response);
                   if(response.status==200)
                   { 
                    var upload_type = response.data.upload_type;
                    console.log(upload_type);
                    if(upload_type == "upload_video")
                        {                                       
                            $(".video_div").html('<video height="200" width="300" controls><source src="'+response.data.video+'" type="video/mp4" /></video>');                                                                       
                        }                          
                    else
                    {
                        $(".video_div").html('');
                        $.each(response.images,function(key,value)
                        {
                            $(".video_div").append('<img src="'+value.image+'" height="100px" width="100px">');
                        });
                    }    
                   }
                },
            });
        });

        $(document).on('click','.icon',function(){
            var id = $(this).attr('id');
            var video_id = $(this).attr('video-id');
            $.ajax({
                url:"{{route('admin.imageDelete')}}",
                dataType:"json",
                type:"post",
                data:{id:id,video_id:video_id},
                success:function(response)
                {
                    if(response.status==200)
                    {
                        console.log('in success');
                        var images = response.images;
                        $(".edit_video_div").html('');
                        $.each(images,function(key,value)
                        {
                            $(".edit_video_div").append('<br><i class="fa fa-close text-danger icon" id="'+value.id+'" video-id="'+response.data.id+'"><img src="'+value.image+'" height="100px" width="100px"></i><br>');
                        });
                    }
                }
            });
        });

        $(document).on('click','#status',function(){
            var id  = $(this).val();
            console.log(id);
            $.ajax({
                url:"{{route('admin.videoStatus')}}",
                dataType:"json",
                type:"post",
                data:{id:id},
                success:function(response)
                {
                    if(response.status==200)
                    {
                        window.LaravelDataTables['videodatatable-table'].draw(); 
                    }
                }
            });
        });

    });
</script> 
 @endpush
