@extends('admin_layout.admin_main')

@section('content')
<h3>{{$data}}</h3>
    <table class="table table-striped">
       
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">published_at</th>
              <th scope="col">link</th>
              <th scope="col">description</th>
              <th scope="col">hashtags</th>
              <th scope="col">slug</th>
              <th scope="col">status</th>
              <th scope="col">Created At</th>
              <th scope="col">Action</th>            
            </tr>
          </thead>
        <tbody id="tbody">
            @forelse($trashedvideo as $video)
          
            <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->title}}</td>
                <td>{{$video->published_at}}</td>
                <td>{{$video->link}}</td>
                <td>{{$video->description}}</td>
                <td>{{$video->hashtags}}</td>
                <td>{{$video->slug}}</td>
                <td>{{$video->status}}</td> 
                <td>{{dateformate('Y/m/s H:i:s',$video->created_at)}}</td>                 
                <td><a href="{{route('admin.videoRestore',['id'=>$video->id])}}"><button class="btn btn-success restore" id="restore" value={{$video->id}}>Restore</button></a><a href="{{route('admin.videoDelete',['id'=>$video->id])}}"><button class="btn btn-danger forcedelete" id="forcedelete" value={{$video->id}}>Delete</button></a></td>               
            </tr>            
              @empty
                <tr>
                   <td colspan="10"> <center><h3> Data Not Available</h3></center><td>
                </tr>
            @endforelse
            {{-- @if(empty($trashedvideo))
            <tr>
                <center> Data Not Available</center>
            </tr>
            @endif --}}
        </tbody>
    </table>
@endsection

