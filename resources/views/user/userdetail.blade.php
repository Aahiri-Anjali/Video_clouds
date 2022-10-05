@extends('layouts.front_main')

@section('content')
        <div class="card">
            <form class="form-horizontal" action="{{route('userInfoUpdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <h4 class="card-title">Personal Info</h4>
                {{-- <div class="form-group row">--}}
                    <center>
                    <img for="image" class="rounded-circle" src="{{$data->image}}" width="300" height="300">
                    </center>
                {{-- </div> --}}
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name Here" value="{{old('fname',$data->first_name)}}">
                    @error('fname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>     
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name Here" value="{{old('lname',$data->last_name)}}">
                    @error('lname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Email Id</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" placeholder="First Name Here" value="{{$data->email}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Mobile No.</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="First Name Here" value="{{old('mobile',$data->mobile)}}">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Country</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="country" name="country" placeholder="First Name Here" value="{{old('country',$data->country)}}">
                       @error('country')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                  
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">State</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="state" name="state" placeholder="First Name Here" value="{{old('state',$data->state)}}">
                       @error('state')
                       <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>   
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">City</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="city" name="city" placeholder="First Name Here" value="{{old('city',$data->city)}}">
                       @error('city')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>              
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-end control-label col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="address" placeholder="First Name Here" value="{{old('address',$data->address)}}">
                        @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label" for="image">Upload Your Pic</label>
                    <div class="col-sm-9">
                        <input type="file" id="update_image" name="image" value="{{old('image')}}" class="form-control" />
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div>
                </div>   
                </div>
                <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
                </div>
                </div>
            </form>
        </div>
@endsection

@push('js')

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>
@endpush
