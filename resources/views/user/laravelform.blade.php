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
{{ Form::open(array('url' => 'foo/bar')) }}
    <div class="row">
        <h1>Laravel Form</h1>
        <br><br><br>
        <div class="col-md-6">
            {{  Form::label('forfname', 'First Name ',array('class'=>'form-label'))  }}
            {{ Form::text('fname','',array('class'=>'form-control'))}}
        </div>
        <div class="col-md-6">
            {{  Form::label('forlname', 'Last Name',array('class'=>'form-label'))  }}
            {{ Form::text('lname','',array('class'=>'form-control'))}}
        </div>
        <div class="col-md-12">
            {{  Form::label('foraddress', 'Address',array('class'=>'form-label'))  }}
            {{ Form::text('address','',array('class'=>'form-control'))}}
        </div>
        <div class="col-md-6">
            {{  Form::label('foremail', 'Email',array('class'=>'form-label'))  }}
            {{ Form::email('email','',array('class'=>'form-control','id'=>'email'))}}
        </div>
        <div class="col-md-4">
        <label class="form-label">States</label>
        <select name="" id="" class="form-select">
            <option value="">Punjab</option>
            <option value="">Sindh</option>
            <option value="">Kpk</option>
            <option value="">Balochistan</option>
        </select>
        </div>
        <div class="col-md-2">
            {{  Form::label('forzip', 'Zip Code',array('class'=>'form-label'))  }}
            {{  Form::number('zip', '',array('class','form-control')) }}
        </div>
        {{-- <div class="col-md-6">
            {{ Form::label('forpassword','Password',array('class'=>'form-label'))}}
            {{ Form::password('email','',array('class'=>'form-control','id'=>'email'))}}
        </div>
        <div class="col-md-6">
            <label class="form-label">Upload Domicile</label>
            <input type="file" class="form-control">
        </div> --}}
        <div class="col-md-6">
        <label class="form-label">Upload Domicile</label>
        <input type="file" class="form-control">
        </div>
        <div class="col-md-6">
            {{  Form::label('forgender', 'Gender',array('class'=>'form-label'))  }}
        <br>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'male',array('class'=>'form-check-input'))  }}
            {{  Form::label('formale', 'Male',array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'female',array('class'=>'form-check-input'))  }}
            {{  Form::label('forfemale', 'Female',array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'other',array('class'=>'form-check-input'))  }}
            {{  Form::label('forother', 'Other',array('class'=>'form-check-label'))  }}
        </div>
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