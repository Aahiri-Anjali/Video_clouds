@extends('layouts.front_main')

@section('content')
<div class="container">
    <br><br><br>
    <h2>Upload Excel File</h2>
    <br><br><br>
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                    {{-- <div>
                    @if(session('msg'))
                        <h2 id="msg">{{session('msg')}}</h2>
                    @endif
                    </div> --}}
                        <form action="{{ route('importexcel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">                              
                                <div class="custom-file">
                                  <input type="file" class="form-control" id="file" name="file" />                                    
                                </div>
                              </div>                    
                              @error('file')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                              <br>
                              <button class="btn btn-primary">Import</button>
                              {{-- <a href="{{route('export')}}">Export</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection