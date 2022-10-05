@extends('layouts.front_main')

@section('content')
<form id="change_password_form" action="{{route('submitChangePassword')}}" method="post">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Current Password</label>
        <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Enter Current Password" value="{{old('currentpassword')}}">
      </div> 
      @if ($errors->has('currentpassword'))
        <span class="text-danger">
            {{ $errors->first('currentpassword') }}
        </span>
     @endif

      <div class="form-group">
        <label for="exampleInputPassword1">New Password</label>
        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password" value="{{old('newpassword')}}">
      </div>
      @error('newpassword')
      <span class="text-danger error_danger" id="newpassword_error">{{$message}}</span>
      @enderror

       <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Confirm Password" value="{{old('confirmpassword')}}">
      </div>
      @error('confirmpassword')
      <span class="text-danger error_danger" id="newpassword_error">{{$message}}</span>
      @enderror

    <div class="card-footer">
      <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

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