@extends('layouts.front_main')

@push('link')
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
    .container{
        margin-top:150px;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #0C4160;

        padding: 30px 10px;
    }

    .card {
        max-width: 500px;
        margin: auto;
        color: black;
        border-radius: 20 px;
    }

    p {
        margin: 0px;
    }

    .container .h8 {
        font-size: 30px;
        font-weight: 800;
        text-align: center;
    }

    .btn.btn-primary {
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 15px;
        background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
        border: none;
        transition: 0.5s;
        background-size: 200% auto;

    }


    .btn.btn.btn-primary:hover {
        background-position: right center;
        color: #fff;
        text-decoration: none;
    }



    .btn.btn-primary:hover .fas.fa-arrow-right {
        transform: translate(15px);
        transition: transform 0.2s ease-in;
    }

    .form-control {
        color: white;
        background-color: #223C60;
        border: 2px solid transparent;
        height: 60px;
        padding-left: 20px;
        vertical-align: middle;
    }

    .form-control:focus {
        color: white;
        background-color: #0C4160;
        border: 2px solid #2d4dda;
        box-shadow: none;
    }

    .text {
        font-size: 14px;
        font-weight: 600;
    }

    ::placeholder {
        font-size: 14px;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<form action="{{route('stripe.submit')}}" method="post">
@csrf
<div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>
                        <input class="form-control @error('name') is-invalid @enderror mb-3" type="text" placeholder="Name" name="name" id="name" value="{{old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3 @error('number') is-invalid @enderror" type="text" placeholder="1234 5678 435678" name="number" id="number" value="{{old('number')}}">
                         @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry Month</p>
                        <input class="form-control mb-3 @error('exp_month') is-invalid @enderror" type="text" placeholder="MM" name="exp_month" id="exp_month" value="{{old('exp_month')}}">
                         @error('exp_month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                 <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry Year</p>
                        <input class="form-control mb-3 @error('exp_year') is-invalid @enderror" type="text" placeholder="YYYY" name="exp_year" id="exp_year" value="{{old('exp_year')}}">
                         @error('exp_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                 <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Amount</p>
                        <input class="form-control mb-3 pt-2 @error('amount') is-invalid @enderror" placeholder="000.00" name="amount" id="amount" value="{{old('amount')}}">
                         @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 @error('cvv') is-invalid @enderror" type="password" placeholder="***" name="cvv" id="cvv" value="{{old('cvv')}}">
                         @error('cvv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="btn btn-primary mb-3">
                        <button type="submit" class="ps-3 btn">Pay</button>
                        <span class="fas fa-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
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