@component('mail::message')
# OTP Varification 
# OTP : {{$token}}

{{-- @component('mail::panel')

@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
