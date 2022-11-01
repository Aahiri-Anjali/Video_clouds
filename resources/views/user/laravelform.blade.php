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
        <h1>{{__('message.form')}}</h1>
        <br><br><br>
        <div class="col-md-6">
            {{  Form::label('forfname', __('message.f_name'),array('class'=>'form-label'))  }}
            {{ Form::text('fname','',array('class'=>'form-control'))}}
            @error('fname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="col-md-6">
            {{  Form::label('forlname',  __('message.l_name') ,array('class'=>'form-label'))  }}
            {{ Form::text('lname','',array('class'=>'form-control'))}}
            @error('lname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('foraddress',  __('message.address') ,array('class'=>'form-label'))  }}
            {{ Form::text('address','',array('class'=>'form-control'))}}
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6">
            {{  Form::label('forfruits', __('message.fruits'),array('class'=>'form-label'))  }}
            <br>
            <div class="form-check form-check-inline">
                {{ Form::label('formango',__('message.mango'),array('class'=>'form-check-label'))}}
                {{ Form::checkbox('fruits[]','Mango',null,['class'=>'form-check-input']) }}
            </div>
            <div class="form-check form-check-inline">
                {{  Form::label('forgraps', __('message.graps'),array('class'=>'form-check-label'))  }}
                {{  Form::checkbox('fruits[]', 'Graps',null,array('class'=>'form-check-input'))  }}
            </div>
            <div class="form-check form-check-inline">
                {{  Form::label('forapple', __('message.apple'),array('class'=>'form-check-label'))  }}
                {{  Form::checkbox('fruits[]', 'Apple',null,array('class'=>'form-check-input'))  }}
            </div>
            @error('fruits')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('foremail',  __('message.email'),array('class'=>'form-label'))  }}
            {{ Form::email('email','',array('class'=>'form-control','id'=>'email'))}}
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4">
            {{  Form::label('forestate', __('message.state'),array('class'=>'form-label'))  }}
            {{ Form::select('state', array(''=>'Select City','punjab' => 'Punjab', 'sindh' => 'Sindh', 'gujarat'=>'Gujarat', 'maharastra'=>'Maharastra'),null,array('class'=>'form-select')) }}
            @error('state')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-2">
            {{  Form::label('forzip',  __('message.zip'),array('class'=>'form-label'))  }}
            {{  Form::number('zip', '',array('class','form-control')) }}
            @error('zip')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class="col-md-6">
            {{  Form::label('forimage', __('message.image'),array('class'=>'form-label'))  }}
            {{ Form::file('image',array('class'=>'form-control'))}}
            {{-- <input type="file" class="form-control"> --}}
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6">
            {{  Form::label('forgender',  __('message.gender'),array('class'=>'form-label'))  }}
        <br>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'male',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('formale', __('message.male'),array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'female',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('forfemale', __('message.female'),array('class'=>'form-check-label'))  }}
        </div>
        <div class="form-check form-check-inline">
            {{  Form::radio('gender', 'other',null,array('class'=>'form-check-input'))  }}
            {{  Form::label('forother', __('message.other'),array('class'=>'form-check-label'))  }}
        </div>
            @error('gender')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <br>
            <button class="btn btn-primary form-control">{{__('message.submit')}}</button>
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