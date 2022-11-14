@extends('layouts.front_main')

@push('link')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<style>
    .container{
        margin-top:150px;
    }
</style>
@endpush
@section('content')
<table class="container table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User_id</th>
            <th scope="col">Customer_id</th>
            <th scope="col">Card_id</th>
            <th scope="col">Charge_id</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i=0; @endphp
        @forelse($stripe as $s)
            <tr>
                @php $i++; @endphp
                <th scope="row">{{$i}}</th>
                <td><img src="{{$s->user->image}}" alt="user" class="rounded-circle" width="31"></td>
                <td>{{$s->customer_id}}</td>
                <td>{{$s->card_id}}</td>
                <td>{{$s->charge_id}}</td>
                <td>{{$s->amount}}</td>
                <td><a href="{{route('stripe.refund',['charge_id'=>$s->charge_id])}}"><button class="btn btn-success">Refund</button></a></td>
            </tr>
            @empty
            <tr>
                <td colspan="10"> <center><h3> Data Not Available</h3></center><td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection

@push('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
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