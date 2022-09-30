@extends('admin_layout.admin_main')
@push('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
{{-- <link rel="stylesheet" href="{{asset('css\forget.css')}}"> --}}
@endpush
@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="change_password_form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Current Password</label>
                      <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Enter Current Password">
                    </div>                  
                    <span class="text-danger error_danger" id="currentpassword_error"></span>

                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password">
                    </div>
                    <span class="text-danger error_danger" id="newpassword_error"></span>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Confirm Password">
                    </div>
                    <span class="text-danger error_danger" id="confirmpassword_error"></span>  

                  <div class="card-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
@endsection

@push('js')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(document).ready(function(){

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      $('#change_password_form').submit(function(e){
        e.preventDefault();
        var form = $('#change_password_form')[0];
        var data = new FormData(form);
        console.log(data);
          $.ajax({
          type:"post",
          dataType:"json",
          url:"{{route('admin.changepassword')}}",
          data:data,
          processData:false,
          contentType:false,
          beforeSend:function() {
                      $(document).find('span.error_danger').text('');
                    },
          success:function(response)
          {
              if(response.status==false)
              {
                $.each(response.errors, function(key,value)
                {
                  var error = "#"+key+"_error";
                  $(error).text(value);
                });
              }
              if(response.status==true)
              {
                console.log('in success');
                $('span').text('');
                $('input').val('');
                swal({
                  title:"Password Changed",
                  icon:"success",
                  text:response.data,
                });
              }
              if(response.status=='false')
              {
                swal({
                  title:"Password Not Changed",
                  icon:"warning",
                  text:response.error,
                });
              }

          }
        });
      });
    });
    </script>
@endpush