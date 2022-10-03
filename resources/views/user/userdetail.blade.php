@extends('layouts.front_main')

@section('content')
        <div class="card">
            <form class="form-horizontal" action="">
                <div class="card-body">
                <h4 class="card-title">Personal Info</h4>
                <div class="form-group row">                
                    {{-- <img for="image"  class="rounded-circle" src="{{$data->image}}" height="20" width="50"> --}}
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->last_name}}">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Email Id</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">Mobile No.</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->mobile}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">State</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->state}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-end control-label col-form-label">City</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->city}}">
                    </div>
                </div>              
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-end control-label col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" placeholder="First Name Here" value="{{$data->address}}">
                    </div>
                </div>           
                </div>
                <div class="border-top">
                <div class="card-body">
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
                </div>
            </form>
        </div>
@endsection
