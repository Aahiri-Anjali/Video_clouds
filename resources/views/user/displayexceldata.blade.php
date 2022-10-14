@extends('layouts.front_main')

@push('link')
<style>
#export{
    margin-left:1100px;
}
</style>
@endpush
@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light text-right">
                    <a href="{{route('export')}}"><button type="button" id="export" class="btn btn-primary"><i class="fa-solid fa-file-export"></i>    Export Data</button></a>
                </div>
            </div>

        <br><br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                </tr>
            </thead>
            @php $i=0; @endphp
            <tbody>
                @forelse($excels as $excel) 
                @php $i++; @endphp             
                    <tr>
                        <th>{{$i}}</th>
                        <th>{{$excel->name}}</th>
                        <th>{{$excel->email}}</th>
                        <th>{{$excel->mobile}}</th>
                    </tr>  
                    @empty
                    <tr>
                       <h2> No records yet</h2> 
                    </tr>        
                @endforelse
            </tbody>
        </table>
    </div>
@endsection