<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css\forget.css')}}">
    <style>
    /* #loader{
        width:"100px";
        height:"100px";
    } */
    </style>
  </head>
  <body>
      <div class="wrapper">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>
        <div class="text-center mt-4 name">
           Reset Password
        </div>
        <form class="p-3 mt-3" method="post" action="{{route('admin.resetvalid')}}">
            @csrf

            {{-- <div>
                @if(session($msg))
                    <p class="text-danger">{{ $msg }}</p>
                @endif
            </div> --}}
            <div id='loader' style='display: none;'>
                <img src="{{asset('image/loading.gif')}}" width='200px' height='100px'>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="otp" id="otp" placeholder="Enter OTP" value="{{old('otp')}}">
            </div>
            @error('otp')
            <span class="text-danger">{{$message}}</span>
            @enderror
           
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password">
            </div>
            @error('cpassword')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <button type="submit" class="btn mt-3">Submit</button> 
            <button type="button" id='resend' class="btn mt-3">Resend Password</button> 

        </form>
        <div class="text-center fs-6">
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>

<script>
    $(document).ready(function()
    {
        $('#resend').click(function(e){
            e.preventDefault();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"{{route('admin.resend')}}",
                beforeSend:function()
                {
                    $('#loader').show();
                },
                success:function(response)
                {
                    if(response.status==true)
                    {
                        swal({
                            title:"Resend OTP",
                            text:response.data,
                            icon:"success",
                        });
                    }
                    if(response.status==false)
                    {
                        swal({
                            title:"Resend OTP",
                            text:response.error,
                            icon:"warning",
                        });
                    }
                },
                complete:function()
                {
                    $('#loader').hide();
                },
            });
        });
    });
</script>