@extends('layouts.front_main')

@push('link')
<style>
.row{
    margin-top:150px;
}
</style>
@endpush

@section('content')
<div class="container">
<center>
{{ Form::open(array('route' => 'laravelform.submit','files'=>'true')) }}
    <div class="row">
        <h1>Laravel Form</h1>
        <br><br><br>
        <div class="col-md-6">
            {{  Form::label('forfname', 'First Name ',array('class'=>'form-label'))  }}
            {{ Form::text('fname','',array('class'=>'form-control'))}}
            @error('fname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="col-md-6">
            {{  Form::label('forlname', 'Last Name',array('class'=>'form-label'))  }}
            {{ Form::text('lname','',array('class'=>'form-control'))}}
            @error('lname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('foraddress', 'Address',array('class'=>'form-label'))  }}
            {{ Form::text('address','',array('class'=>'form-control'))}}
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6">
            {{  Form::label('forfruits', 'Fruits',array('class'=>'form-label'))  }}
            <br>
            <div class="form-check form-check-inline">
                {{ Form::label('formango','Mango',array('class'=>'form-check-label'))}}
                {{ Form::checkbox('fruits[]','Mango',null,['class'=>'form-check-input']) }}
            </div>
            <div class="form-check form-check-inline">
                {{  Form::label('forgraps', 'Graps',array('class'=>'form-check-label'))  }}
                {{  Form::checkbox('fruits[]', 'Graps',null,array('class'=>'form-check-input'))  }}
            </div>
            <div class="form-check form-check-inline">
                {{  Form::label('forapple', 'Apple',array('class'=>'form-check-label'))  }}
                {{  Form::checkbox('fruits[]', 'Apple',null,array('class'=>'form-check-input'))  }}
            </div>
            @error('fruits')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('foremail', 'Email',array('class'=>'form-label'))  }}
            {{ Form::email('email','',array('class'=>'form-control','id'=>'email'))}}
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4">
            {{  Form::label('forestate', 'State',array('class'=>'form-label'))  }}
            {{ Form::select('state', array(''=>'Select City','punjab' => 'Punjab', 'sindh' => 'Sindh', 'gujarat'=>'Gujarat', 'maharastra'=>'Maharastra'),null,array('class'=>'form-select')) }}
            @error('state')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-2">
            {{  Form::label('forzip', 'Zip Code',array('class'=>'form-label'))  }}
            {{  Form::number('zip', '',array('class','form-control')) }}
            @error('zip')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('forimage', 'Upload Image',array('class'=>'form-label'))  }}
            {{ Form::file('image',array('class'=>'form-control'))}}
            {{-- <input type="file" class="form-control"> --}}
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6">
            {{  Form::label('forgender', 'Gender',array('class'=>'form-label'))  }}
        <br>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'male',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('formale', 'Male',array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'female',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('forfemale', 'Female',array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'other',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('forother', 'Other',array('class'=>'form-check-label'))  }}
        </div>
            @error('gender')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <br>
            <button class="btn btn-primary form-control">Submit</button>
        </div>
    </div>
    {{ Form::close() }}
    </center>
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