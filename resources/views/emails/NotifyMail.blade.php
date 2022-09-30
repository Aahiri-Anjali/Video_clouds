@component('mail::message')
<h1>Hello {{$name}}</h1>
# Congrates...!! You have registered Successfully... 

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{$name}}
{{ config('app.name') }}
@endcomponent
