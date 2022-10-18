<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/laravelmix.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <center>
        <header>
            <h1>Admin Login</h1>
        </header>
        <main>
            <form class="form_class" action="{{ route('admin.login') }}" method="POST">
                @csrf
                {{-- @if ($errors->any())
                    @dd($errors->all())
                @endif --}}

                {{-- @if($msg)
                <span class="text-danger">{{$msg}}</span>
                @endif --}}
                <div class="form_div">
                    <label>Email:</label>
                    <input class="field_class @error('email') is-invalid @enderror" name="email" id="email"
                        type="text" placeholder="Enter Email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Password:</label>
                    <input id="password" class="field_class @error('password') is-invalid @enderror" name="password"
                        type="password" placeholder="Enter Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="submit_class" type="submit">Enter</button>
                    <a href="{{route('admin.forgetshow')}}">Forget Password</a>
                </div>
            </form>
        </main>
        <footer>
        </footer>
    </center>
    <script src="{{ asset('js/laravelmix.js') }}"></script>
    <script src="{{ asset('js/commom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>


